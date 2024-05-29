<?php

use App\Http\Middleware\WithAuth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    if (auth()->guest()) {
        return redirect()->route('login');
    } else {
        if (auth()->user()->role === "student" && auth()->user()->status === 'inactive') {
            return redirect()->route('pending');
        }
        return redirect()->route('dashboard');
    }
});

Auth::routes();

Route::middleware([WithAuth::class])->group(function(){

    Route::get('pending', [\App\Http\Controllers\DashboardController::class, 'pending'])->name('pending');
    Route::get('dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/information', \App\Http\Controllers\InformationController::class);
    Route::resource('/registration', \App\Http\Controllers\RegistrationController::class);
    Route::get('/internship/submission', [\App\Http\Controllers\InternshipController::class, 'index_submission'])->name('internship.index_submission');
    Route::resource('/internship', \App\Http\Controllers\InternshipController::class);
    Route::resource('/schedule', \App\Http\Controllers\ScheduleController::class);
    Route::resource('/teacher', \App\Http\Controllers\TeacherController::class);
    Route::resource('/report', \App\Http\Controllers\ReportController::class);
    Route::resource('/user', \App\Http\Controllers\UserController::class);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});