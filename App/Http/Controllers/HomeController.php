<?php

namespace App\Http\Controllers;

use App\Models\City;

class HomeController
{
    public static function index()
    {
        $cities = new City();
        $cities = $cities::run()->get();
        return view('home', compact('cities'));
    }
}
