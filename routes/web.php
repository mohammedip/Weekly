<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AnnoncesController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('category', CategoryController::class);

Route::resource('annonce', AnnoncesController::class);

Route::resource('user', UserController::class);