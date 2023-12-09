<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\StoreUserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('user.register');
    }

    public function store(StoreUserRequest $request)
    {
        $user_info  =  $request->validated();
        $user = User::create($user_info);
        event(new Registered($user));
        Auth::login($user);
        return redirect()->route('post.index');
    }
}
