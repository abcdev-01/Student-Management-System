<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function show($name)
    {
        return view('students', ['username' => $name]);
    }
}
