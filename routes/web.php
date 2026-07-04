<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;


// ── Auth: show forms (GET) ──
Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::get('/password/reset', fn() => view('auth.login'))->name('password.request');

// ── Auth: handle submissions (POST) ──
Route::post('/register', [AuthController::class, 'register'])->name('register.store');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ── Dashboard ──
// AuthController يحوّل بعد التسجيل/الدخول إلى route('dashboard').
Route::get('/dashboard', fn() => redirect()->route('departments.index'))->name('dashboard');

// Redirect root
Route::get('/', fn() => redirect()->route('login.form'));

// ── Resources ──
Route::resource('departments', DepartmentController::class)->except('show');
Route::resource('students', StudentController::class)->except('show');
Route::resource('courses', CourseController::class)->except('show');
Route::resource('professors', ProfessorController::class)->except('show');
Route::resource('enrollments', EnrollmentController::class)->except('show');