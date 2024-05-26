<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Route::resource('/information', \App\Http\Controllers\InformationController::class);

Route::resource('/registration', \App\Http\Controllers\RegistrationController::class);

Route::get('/internship/submission', [\App\Http\Controllers\InternshipController::class, 'index_submission'])->name('internship.index_submission');
Route::resource('/internship', \App\Http\Controllers\InternshipController::class);

Route::resource('/schedule', \App\Http\Controllers\ScheduleController::class);
Route::resource('/user', \App\Http\Controllers\UserController::class);
Route::resource('/teacher', \App\Http\Controllers\TeacherController::class);
Route::resource('/report', \App\Http\Controllers\ReportController::class);
// Route::resource('/', \App\Http\Controllers\InformationController::class);

// Route::get('/schedule', function () {
//     return view('s', [ 'schedules' =>[
//         [
//             'id' => 1,
//             'dosen' => "Dian",
//             'ruangan' => 16,
//             'tanggal' => "2 Juli 2023",
//             'waktu' => "12.00 - 13.00",
//             'durasi' => "1 jam"
//         ],
//         [
//             'id' => 2,
//             'dosen' => "perdi",
//             'ruangan' => 17,
//             'tanggal' => "6 Juli 2023",
//             'waktu' => "12.00 - 13.00",
//             'durasi' => "1 jam"
//         ]
//     ]
//     ]);
// })->name('schedule');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
