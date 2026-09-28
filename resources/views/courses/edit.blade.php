@extends('layouts.app')

@section('title', 'Edit Course')

@section('content')
    <div class="nav-links">
        <a href="{{ route('students.index') }}">Students</a>
        <a href="{{ route('courses.index') }}">Courses</a>
        <a href="{{ route('enrollments.index') }}">Enrollments</a>
    </div>

    <div class="card">
        <h2>Edit Course</h2>

        <form action="{{ route('courses.update', $course) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="course_code">Course Code</label>
                <input type="text" id="course_code" name="course_code" value="{{ old('course_code', $course->course_code) }}" required>
            </div>

            <div class="form-group">
                <label for="course_name">Course Name</label>
                <input type="text" id="course_name" name="course_name" value="{{ old('course_name', $course->course_name) }}" required>
            </div>

            <button type="submit">Update Course</button>
            <a href="{{ route('courses.index') }}" class="btn-secondary" style="margin-left:8px;">Cancel</a>
        </form>
    </div>
@endsection