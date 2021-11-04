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

Route::get('/quiz/{mid}', function ($mid) {
    return view('pages.quiz')->with(['mid' => $mid]);
})->name('quiz.show');
