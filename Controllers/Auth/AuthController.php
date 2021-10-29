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
        return 'login post';
    }
    public function register()
    {
        return view('register');
    }
    public function registerPost()
    {
        return 'login post';
    }
}
