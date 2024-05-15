<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('home');

Route::get('/schedule', function () {
    return view('schedule/index');
})->name('schedule');

Route::get('/report', function () {
    return view('report/index');
})->name('report');

