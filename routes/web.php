<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\CourseController;

Route::resource('students', StudentController::class);
Route::resource('enrollments', EnrollmentController::class);
Route::resource('courses', CourseController::class);
Route::get('/', fn() => view('home'))->name('home');
