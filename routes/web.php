<?php

use Classes\Route;
use Controllers\HomeController;

Route::get('/', function () {
    HomeController::cities();
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
