<?php

namespace Classes;

class Auth
{
    public $user = null;
    public function attempt($column = null, $password = null)
    {
        $user = DB::run()->table('users')->where($column,'=',$_POST[$column])->first();
        if ($user && hash_check($_POST[$password], $user->password)) {
            $this->user = $user;
            return true;
        }
    }
}
