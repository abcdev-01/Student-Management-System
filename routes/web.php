<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use Illuminate\Support\Facades\Route;

// Main View
Route::get('/', [StudentController::class, 'index'])->name('home');

// Student APIs
Route::prefix('api/students')->group(function () {
    Route::get('/', [StudentController::class, 'list']);
    Route::post('/', [StudentController::class, 'store']);
    Route::get('/{student}', [StudentController::class, 'show']);
    Route::put('/{student}', [StudentController::class, 'update']);
    Route::delete('/{student}', [StudentController::class, 'destroy']);
});

// Course APIs
Route::prefix('api/courses')->group(function () {
    Route::get('/', [CourseController::class, 'list']);
    Route::post('/', [CourseController::class, 'store']);
    Route::delete('/{course}', [CourseController::class, 'destroy']);
});

// Enrollment APIs
Route::post('api/enrollments', [EnrollmentController::class, 'enroll']);
Route::get('api/students/{student}/enrollments', [EnrollmentController::class, 'studentEnrollments']);