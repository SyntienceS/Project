<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/listings', function () {
    return view('listings');
});

Route::get('/listings/new', function () {
    return view('new_listing');
});


Route::get('/auth', function () {
    return view('auth');
});
