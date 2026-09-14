<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\StudentController;

Route::get('/students/{name}', [StudentController::class, 'show']);
