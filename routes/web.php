<?php

use Classes\Route;
use Controllers\HomeController;

Route::get('/', function () {
    HomeController::cities();
});
Route::get('/login', function () {
    return view('login');
});
Route::post('/login', function () {
    return 'Login Post';
});
Route::get('/register', function () {
    return view('register');
});
Route::post('/register', function () {
    return 'Register Post';
});
