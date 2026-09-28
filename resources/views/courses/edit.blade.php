@extends('layouts.app')

@section('title', 'Edit Course')

@section('content')
    <div class="content-card narrow">
        <h2 class="card-heading">Edit Course</h2>

        <form action="{{ route('courses.update', $course) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-field">
                <label class="form-label" for="course_code">Course Code</label>
                <input type="text" id="course_code" name="course_code" class="form-input"
                    value="{{ old('course_code', $course->course_code) }}" required>
                @error('course_code')<span class="form-error">{{ $message }}</span>@enderror
            </div>

            <div class="form-field">
                <label class="form-label" for="course_name">Course Name</label>
                <input type="text" id="course_name" name="course_name" class="form-input"
                    value="{{ old('course_name', $course->course_name) }}" required>
                @error('course_name')<span class="form-error">{{ $message }}</span>@enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-update">Update Course</button>
                <a href="{{ route('courses.index') }}" class="btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
@endsection