<?php

use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('main');
})->name('main');

Auth::routes();

Route::get('/main', [App\Http\Controllers\HomeController::class, 'index'])->name('main');

Auth::routes();

Route::get('/main', [App\Http\Controllers\HomeController::class, 'index'])->name('main');
// Optimization is possible, to make my life easier
Route::post('/survey', [SurveyController::class, 'store'])->name('survey.store');

Route::resource('products', ProductController::class);
Route::get('view-products', [ProductController::class, 'viewProducts'])->name('products.view');
Route::post('products/{product}/buy', [ProductController::class, 'buy'])->name('products.buy');
Route::post('products/{product}/sell', [ProductController::class, 'sell'])->name('products.sell');

// Route to view the "About Us" page
Route::get('/about_us', function () {
    return view('about_us');
})->name('about_us');

// Route to view the "Contact Information" page
Route::get('/contact_information', function () {
    return view('contact_information');
})->name('contact_information');

// Route to view the "Survey" page
Route::get('/survey', function () {
    return view('survey');
})->name('survey');