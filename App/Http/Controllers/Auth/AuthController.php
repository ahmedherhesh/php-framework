<?php

namespace App\Http\Controllers\Auth;

use App\Http\Resources\UserResources;
use Core\Classes\Request;

class AuthController
{
    public function login()
    {
        return view('login');
    }
    public function loginPost(Request $request)
    {
        if (auth()->attempt('email', 'password')) {
            return json(new UserResources(auth()->user));
        };
    }
    public function register()
    {
        return view('register');
    }
    public function registerPost(Request $request)
    {
        return 'register post';
    }
}
