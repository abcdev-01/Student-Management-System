@extends('layouts.app')

@section('title', 'Student Profile')

@section('content')
    <div class="nav-links">
        <a href="{{ route('students.index') }}">Students</a>
        <a href="{{ route('courses.index') }}">Courses</a>
        <a href="{{ route('enrollments.index') }}">Enrollments</a>
    </div>

    <div class="card">
        <h2>Student Profile</h2>

        <p><b>Name:</b> {{ $student->full_name }}</p>
        <p><b>Email:</b> {{ $student->email }}</p>
        <p><b>Age:</b> {{ $student->age }}</p>
        <p><b>Phone:</b> {{ $student->phone_number }}</p>
        <p><b>Gender:</b> {{ $student->gender }}</p>
        <p><b>Registered on:</b> {{ $student->registration_date }}</p>
        <p><b>Status:</b> <span class="badge {{ $student->status }}">{{ $student->status }}</span></p>

        <h3>Active Program Course Enrollments</h3>
        @if($student->courses->count())
            <ul>
                @foreach($student->courses as $course)
                    <li>
                        <code>{{ $course->course_code }}</code> — {{ $course->course_name }}
                        (Enrolled: {{ $course->pivot->enrollment_date }})
                    </li>
                @endforeach
            </ul>
        @else
            <p>No active enrollments for this profile found.</p>
        @endif

        <a href="{{ route('students.index') }}" class="btn-secondary" style="margin-top:16px;">Back to Roster</a>
    </div>
@endsection