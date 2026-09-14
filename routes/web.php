<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/students/{name}', function ($name) {
    return view('students', ['username' => $name]);
});
