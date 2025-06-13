<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\userController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\listingController;
use App\Http\Controllers\mediaController;
use App\Http\Controllers\reportController;
use App\Http\Controllers\reviewController;
use App\Http\Controllers\sessionController;
use App\Http\Controllers\offerController;


Route::post('/auth/register', [userController::class, 'register']);
Route::post('/auth/login', [userController::class, 'login']);

Route::get('/categories/read', [categoryController::class, 'read']);
Route::get('/categories/readspecial', [categoryController::class, 'readspecial']);

Route::post('/media/create', [mediaController::class, 'create']);
Route::post('/media/delete', [mediaController::class, 'delete']);

Route::post('/offers/create', [offerController::class, 'create']);
Route::post('/offers/delete', [offerController::class, 'delete']);

Route::post('/reviews/getfromuser', [reviewController::class, 'getfromuser']);
Route::post('/reviews/create', [reviewController::class, 'create']);
Route::post('/reviews/delete', [reviewController::class, 'delete']);
Route::post('/reviews/update', [reviewController::class, 'update']);

Route::post('/listings/getfromcategory', [listingController::class, 'getfromcategory']);
Route::post('/listings/create', [listingController::class, 'create']);
Route::post('/listings/close', [listingController::class, 'close']);
Route::post('/listings/update', [listingController::class, 'update']);
Route::post('/listings/read', [listingController::class, 'read']);

Route::post('/reports/create', [reportController::class, 'create']);
Route::post('/reports/read', [reportController::class, 'read']);

