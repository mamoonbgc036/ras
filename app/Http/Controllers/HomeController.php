<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function search(Request $request)
    {
        if ($request->date && $request->userId) {
            $posts = Post::whereDate('created_at', $request->date)->where('user_id', $request->userId)->get();
        } elseif ($request->id) {
            $posts = Post::where('user_id', $request->userId)->get();
        } else {
            $posts = Post::whereDate('created_at', $request->date)->get();
        }
        return view('search', [
            'posts' => $posts,
            'user' => User::find($request->userId),
            'date' => $request->date
        ]);
    }
}
