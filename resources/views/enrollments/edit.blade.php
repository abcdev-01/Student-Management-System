@extends('layouts.app')

@section('title', 'Edit Enrollment')

@section('content')
    <div class="nav-links">
        <a href="{{ route('students.index') }}">Students</a>
        <a href="{{ route('courses.index') }}">Courses</a>
        <a href="{{ route('enrollments.index') }}">Enrollments</a>
    </div>

    <div class="card">
        <h2>Edit Enrollment</h2>

        <form action="{{ route('enrollments.update', $enrollment) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="student_id">Select Student</label>
                <select id="student_id" name="student_id" required>
                    @foreach($students as $student)
                        <option value="{{ $student->id }}" {{ old('student_id', $enrollment->student_id) == $student->id ? 'selected' : '' }}>
                            {{ $student->full_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="course_id">Select Course</label>
                <select id="course_id" name="course_id" required>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}" {{ old('course_id', $enrollment->course_id) == $course->id ? 'selected' : '' }}>
                            {{ $course->course_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="enrollment_date">Enrollment Date</label>
                <input type="date" id="enrollment_date" name="enrollment_date" value="{{ old('enrollment_date', $enrollment->enrollment_date) }}" required>
            </div>

            <button type="submit">Update Enrollment</button>
            <a href="{{ route('enrollments.index') }}" class="btn-secondary" style="margin-left:8px;">Cancel</a>
        </form>
    </div>
@endsection