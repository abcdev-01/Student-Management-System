<?php
namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function show($id)
    {
        $student = Student::all($id);
        return view('students', [compact('student')]);
    }
}