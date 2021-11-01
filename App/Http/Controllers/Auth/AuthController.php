<?php

namespace App\Http\Controllers\Auth;

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
            return json(auth()->user);
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
