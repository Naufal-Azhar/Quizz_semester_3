<?php

use Illuminate\Support\Facades\Route;

// WEB ROUTES
Route::get('/', function () {
    return view('game');
});

Route::get('/welcome', function () {
    return view('welcome');
});
