<?php

namespace Controllers\Auth;

use Classes\DB;

class AuthController
{
    public function login()
    {
        return view('login');
    }
    public function loginPost()
    {
        $user = DB::run()->table('users')->where(['email','=',$_POST['email']])->first();
        if($user && hash_check($_POST['password'],$user->password)){
            return json($user);
        }
        return 'Email Or Password Is  Not Matched';
    }
    public function register()
    {
        return redirect('/login');
    }
    public function registerPost()
    {
        return 'login post';
    }
}
