<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;


// ── Auth: show forms (GET) ──
Route::get('/login', fn() => view('auth.login'))->name('login.form');
Route::get('/register', fn() => view('auth.register'))->name('register');
Route::get('/password/reset', fn() => view('auth.login'))->name('password.request');

// ── Auth: handle submissions (POST) ──
// NOTE: تأكّد أن اسم الدالة 'register' يطابق الدالة في AuthController التي تنشئ المستخدم.
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

Route::post('/login', function () {
    return redirect()->route('departments.index');
})->name('login');

// ── Dashboard ──
// الـ AuthController يحوّل بعد التسجيل/الدخول إلى route('dashboard').
// لا توجد صفحة dashboard مستقلة، فنوجّهه إلى قائمة الأقسام.
Route::get('/dashboard', fn() => redirect()->route('departments.index'))->name('dashboard');

// Redirect root
Route::get('/', fn() => redirect()->route('login.form'));

// ── Resources ──
Route::resource('departments', DepartmentController::class)->except('show');
Route::resource('students', StudentController::class)->except('show');
Route::resource('courses', CourseController::class)->except('show');
Route::resource('professors', ProfessorController::class)->except('show');
Route::resource('enrollments', EnrollmentController::class)->except('show');