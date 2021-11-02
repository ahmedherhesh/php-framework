<?php

namespace App\Http\Controllers;

use App\Models\City;

class HomeController
{
    public static function index()
    {

        $validate  = validate([
            'code'   => 'required|max:8|min:4|int',
            'mobile' => 'required|max:8|min:4|string',
            'name'   => 'required|max:8|min:4|string',
        ]);
        
        if($validate){
            return json($validate,403);
        }

        $cities = new City();
        $cities = $cities::run()->get();
        return view('home', compact('cities'));
    }
}
