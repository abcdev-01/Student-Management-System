<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\StudentController;
Route::get('/students/{id}', [StudentController::class, 'show']);