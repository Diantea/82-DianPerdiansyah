<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('dashboard');
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

// Route::get('/', function () {
//     return view('dashboard', ['informations' =>[
//         [
//             'id' => 1,
//             'judul' => 'Himasi Cup',
//             'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe illum facere eius aperiam reiciendis ullam similique',
//             'tanggal' => '12/04/2024',
//             'foto' => "foto"
//         ],
//         [
//             'id' => 2,
//             'judul' => 'UTS',
//             'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe illum facere eius aperiam reiciendis ullam similique, Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe illum facere eius aperiam reiciendis ullam similique,Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe illum facere eius aperiam reiciendis ullam similique,',
//             'tanggal' => '12/04/2024',
//             'foto' => "foto"
//         ]
//     ]]);
// })->name('home');

// Route::get('/schedule', function () {
//     return view('schedule/index', [ 'schedules' =>[
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

// Route::get('/report', function () {
//     return view('report/index', [
//         'students' => [
//         [
//             'id' => 1,
//             'npm' => 'D18384',
//             'nama' => 'Yans'
//         ],
//         [
//             'id' => 2,
//             'npm' => 'D38384',
//             'nama' => 'Gigs'
//         ]
//         ]
//     ]);
// })->name('report');
// Route::get('/report', function () {
//     return view('report/index', [
//         'students' => [
//         [
//             'id' => 1,
//             'npm' => 'D18384',
//             'nama' => 'Yans'
//         ],
//         [
//             'id' => 2,
//             'npm' => 'D38384',
//             'nama' => 'Gigs'
//         ]
//         ]
//     ]);
// })->name('report');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
