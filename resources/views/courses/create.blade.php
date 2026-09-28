@extends('layouts.app')

@section('title', 'Create Course')

@section('content')
    <div class="nav-links">
        <a href="{{ route('students.index') }}">Students</a>
        <a href="{{ route('courses.index') }}">Courses</a>
        <a href="{{ route('enrollments.index') }}">Enrollments</a>
    </div>

    <div class="card">
        <h2>Register Course</h2>

        <form action="{{ route('courses.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="course_code">Course Code</label>
                <input type="text" id="course_code" name="course_code" placeholder="Course code..."
                    value="{{ old('course_code') }}" required>
            </div>

            <div class="form-group">
                <label for="course_name">Course Name</label>
                <input type="text" id="course_name" name="course_name" placeholder="Course Name..."
                    value="{{ old('course_name') }}" required>
            </div>

            <button type="submit">Create New Course</button>
            <a href="{{ route('courses.index') }}" class="btn-secondary" style="margin-left:8px;">Cancel</a>
        </form>
    </div>
@endsection