<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/


Route::get('/dev', function () {
    return view('dev');
})->name('dev');

Route::get('/', function () {
    return view('pages.home');
})->name('home');

