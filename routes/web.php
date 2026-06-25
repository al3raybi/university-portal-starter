<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;


// Auth Routes
Route::get('/login', fn() => view('auth.login'))->name('login.form');
Route::get('/register', fn() => view('auth.register'))->name('register');
Route::get('/password/reset', fn() => view('auth.login'))->name('password.request');

Route::resource('courses', CourseController::class);



Route::post('/login', function () {
    return redirect()->route('departments.index');
})->name('login');

// Redirect root
Route::get('/', fn() => redirect()->route('login.form'));

// Resources
Route::resource('departments', DepartmentController::class)->except('show');
Route::resource('students', StudentController::class)->except('show');
Route::resource('courses', CourseController::class)->except('show');
Route::resource('professors', ProfessorController::class)->except('show');
Route::resource('enrollments', EnrollmentController::class)->except('show');