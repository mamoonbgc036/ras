<?php

use Whoops\Run;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\post\PostController;
use App\Http\Controllers\user\LoginController;
use App\Http\Controllers\user\LogoutController;
use App\Http\Controllers\user\RegisterController;
use App\Models\Post;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // $users = User::with('posts')->where('toggle', 1)->get();
    $users = User::with(['posts' => function ($query) {
        $query->where('toggle', 1);
    }])->get();
    // dd($usersWithPosts);
    return view('home', compact('users'));
})->name('home');

Route::get('/home/search', [HomeController::class, 'search'])->name('home.search');


Route::get('/user', [LoginController::class, 'index'])->name('user.login');
Route::post('/user', [LoginController::class, 'login'])->name('login');

Route::get('/register', [RegisterController::class, 'index'])->name('user.register');
Route::post('/register', [RegisterController::class, 'store']);

Route::middleware(['auth'])->group(function () {
    Route::get('/post/index', [PostController::class, 'index'])->name('post.index');
    Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::get('/post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/post/{post}', [PostController::class, 'update'])->name('post.update');
    Route::get('/post/search', [PostController::class, 'search'])->name('post.search');
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
    Route::put('/post/toggle/{post}', [PostController::class, 'toggle'])->name('post.toggle');
    Route::post('/logout', [LogoutController::class, 'logout'])->name('user.logout');
});
