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

Route::get('/listing', function () {
    return view('listing');
});

Route::get('/auth', function () {
    return view('auth');
});

Route::get('/contacts', function () {
    return view('contacts');
});

Route::get('/help', function () {
    return view('help');
});

Route::get('/about', function () {
    return view('about');
});
