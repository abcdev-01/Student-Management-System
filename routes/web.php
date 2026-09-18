<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::resource('students', StudentController::class);
//Route::resource('enrollments', EnrollmentController::class);
//Route::resource('courses', CourseController::class);
Route::get('/', fn() => view('home'))->name('home');
