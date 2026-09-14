<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Controllers\StudentController;

Route::get('/students/{name}', [StudentController::class, 'show']);
