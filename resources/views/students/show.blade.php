@extends('layouts.app')

@section('title', 'Student Profile')

@section('content')
    <div class="content-card narrow">
        <h2 class="card-heading">Student Profile</h2>

        <div class="profile-field">
            <span class="profile-label">Name:</span>
            <span class="profile-value">{{ $student->full_name }}</span>
        </div>
        <div class="profile-field">
            <span class="profile-label">Email:</span>
            <span class="profile-value">{{ $student->email }}</span>
        </div>
        <div class="profile-field">
            <span class="profile-label">Age:</span>
            <span class="profile-value">{{ $student->age }}</span>
        </div>
        <div class="profile-field">
            <span class="profile-label">Phone:</span>
            <span class="profile-value">{{ $student->phone_number }}</span>
        </div>
        <div class="profile-field">
            <span class="profile-label">Gender:</span>
            <span class="profile-value">{{ $student->gender }}</span>
        </div>
        <div class="profile-field">
            <span class="profile-label">Registered on:</span>
            <span class="profile-value">{{ $student->registration_date }}</span>
        </div>
        <div class="profile-field">
            <span class="profile-label">Status:</span>
            <span class="status-badge status-{{ strtolower($student->status) }}">{{ $student->status }}</span>
        </div>

        <h3 style="color: var(--primary); margin-top: 24px;">Active Program Course Enrollments</h3>

        @if($student->courses->count())
            <ul class="enrollment-list">
                @foreach($student->courses as $course)
                    <li class="enrollment-item">
                        <span class="enrollment-code">{{ $course->course_code }}</span>
                        — {{ $course->course_name }}
                        (Enrolled: {{ $course->pivot->enrollment_date }})
                    </li>
                @endforeach
            </ul>
        @else
            <p style="color: var(--text-muted);">No active enrollments for this profile found.</p>
        @endif

        <div class="form-actions">
            <a href="{{ route('students.index') }}" class="btn-cancel">Back to Roster</a>
        </div>
    </div>
@endsection