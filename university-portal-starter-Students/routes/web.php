<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;










// 1. Redirect the root URL to the students index page
Route::get('/', function () {
    return redirect()->route('students.index');
});

// 2. Register the resource routes for each of the five controllers, excluding 'show'
Route::resource('departments', DepartmentController::class)->except(['show']);
Route::resource('students', StudentController::class)->except(['show']);
Route::resource('courses', CourseController::class)->except(['show']);
Route::resource('professors', ProfessorController::class)->except(['show']);
Route::resource('enrollments', EnrollmentController::class)->except(['show']);