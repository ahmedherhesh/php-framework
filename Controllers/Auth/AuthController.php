<?php

namespace Controllers\Auth;

class AuthController
{
    public function login()
    {
        return view('login');
    }
    public function loginPost()
    {
        if (auth()->attempt('email', 'password')) {
            return json(auth()->user);
        };
    }
    public function register()
    {
        return view('register');
    }
    public function registerPost()
    {
        return 'register post';
    }
}
