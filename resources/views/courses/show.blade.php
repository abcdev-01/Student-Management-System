@extends('layouts.app')

@section('title', 'Course Details')

@section('content')
    <div class="content-card narrow">
        <h2 class="card-heading">Course Details</h2>

        <div class="profile-field">
            <span class="profile-label">Code:</span>
            <span class="profile-value">{{ $course->course_code }}</span>
        </div>
        <div class="profile-field">
            <span class="profile-label">Name:</span>
            <span class="profile-value">{{ $course->course_name }}</span>
        </div>

        <div class="form-actions">
            <a href="{{ route('courses.index') }}" class="btn-cancel">Back to Courses</a>
        </div>
    </div>
@endsection