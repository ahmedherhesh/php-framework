<?php

namespace Core\Classes;
use Core\Classes\Request;
class Auth
{
    public $user = null;
    public function attempt($column = null, $password = null)
    {
        $request = new Request;
        $user = DB::run()->table('users')->where($column,'=',$request->request->$column)->first();
        if ($user && hash_check($request->request->$password, $user->password)) {
            $this->user = $user;
            return true;
        }
    }
}
