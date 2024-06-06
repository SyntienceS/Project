<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
})->name('main');

Auth::routes();

Route::get('/main', [App\Http\Controllers\HomeController::class, 'index'])->name('main');

Auth::routes();

Route::get('/main', [App\Http\Controllers\HomeController::class, 'index'])->name('main');

// Route to view the Auctions page
Route::get('/auctions', function () {
    return view('auctions');
})->name('auctions');

// Route to view the About Us page
Route::get('/about_us', function () {
    return view('about_us');
})->name('about_us');

// Route to view the Contact Information page
Route::get('/contact_information', function () {
    return view('contact_information');
})->name('contact_information');

// Route to view the Survey page
Route::get('/survey', function () {
    return view('survey');
})->name('survey');