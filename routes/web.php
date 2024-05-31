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
    // Pending
    Route::get('pending', [\App\Http\Controllers\DashboardController::class, 'pending'])->name('pending');
    
    // Dashboar
    Route::get('dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    
    // Information
    Route::resource('/information', \App\Http\Controllers\InformationController::class);
    
    // Registration
    Route::resource('/registration', \App\Http\Controllers\RegistrationController::class);
    
    //Company
    Route::post('/company/request', [\App\Http\Controllers\CompanyController::class, 'request_company'])->name('company.request_company');
    Route::post('/company/register', [\App\Http\Controllers\CompanyController::class, 'register_company'])->name('company.register_company');
    Route::get('/company/submission', [\App\Http\Controllers\CompanyController::class, 'index_submission'])->name('company.index_submission');
    Route::resource('/company', \App\Http\Controllers\CompanyController::class);

    // Internship
    Route::resource('/internship', \App\Http\Controllers\InternshipController::class);
    // Route::get('/internship/submission', [\App\Http\Controllers\InternshipController::class, 'index_submission'])->name('internship.index_submission');
    
    // Schedule
    Route::resource('/schedule', \App\Http\Controllers\ScheduleController::class);
    
    // Guiding Teacher
    Route::post('/teacher/{teacher}/add-student', [\App\Http\Controllers\TeacherController::class, 'add_student'])->name('teacher.add_student');
    Route::resource('/teacher', \App\Http\Controllers\TeacherController::class);

    // Daily Report
    Route::get('/report/student/{student}', [\App\Http\Controllers\ReportController::class, 'index_student'])->name('report.index_student');
    Route::get('/report/student/{student}/detail/{report}', [\App\Http\Controllers\ReportController::class, 'show_student'])->name('report.show_student');
    Route::get('/report/student/{student}/detail/{report}', [\App\Http\Controllers\ReportController::class, 'show_student'])->name('report.show_student');
    Route::resource('/report', \App\Http\Controllers\ReportController::class);

    // Last Report
    Route::get('/last-report/student/{student}', [\App\Http\Controllers\LastReportController::class, 'index_student'])->name('last-report.index_student');
    Route::get('/last-report/student/{student}/detail/{report}', [\App\Http\Controllers\LastReportController::class, 'show_student'])->name('last-report.show_student');
    Route::resource('/last-report', \App\Http\Controllers\LastReportController::class);
 
    // User
    Route::get('/user/{user}/reset-password', [\App\Http\Controllers\UserController::class, 'reset_password'])->name('user.reset-password');
    Route::get('/profile', [\App\Http\Controllers\UserController::class, 'profile'])->name('profile');
    Route::resource('/user', \App\Http\Controllers\UserController::class);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});