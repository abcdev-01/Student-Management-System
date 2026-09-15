<?php
namespace App\Http\Controllers;
use App\Models\Student;
class StudentController extends Controller
{
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('students', ['username' => $student->name]);
    }
}