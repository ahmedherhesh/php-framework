<?php

namespace App\Http\Controllers;

use Classes\DB;

class HomeController
{
    public static function index()
    {
        $cities = DB::run()->table('cities')
            ->where('name_en','!=','test1')
            ->where('name_en','!=','test2')
            ->orderBy('id', 'desc')
            ->get();
        return view('home',compact('cities'));
    }
}