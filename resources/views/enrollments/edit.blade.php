@extends('layouts.app')

@section('title', 'Edit Enrollment')

@section('content')
    <div class="content-card narrow">
        <h2 class="card-heading">Edit Enrollment</h2>

        <form action="{{ route('enrollments.update', $enrollment) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-field">
                <label class="form-label" for="student_id">Select Student</label>
                <select id="student_id" name="student_id" class="form-input" required>
                    @foreach($students as $student)
                        <option value="{{ $student->id }}" {{ old('student_id', $enrollment->student_id) == $student->id ? 'selected' : '' }}>
                            {{ $student->full_name }}
                        </option>
                    @endforeach
                </select>
                @error('student_id')<span class="form-error">{{ $message }}</span>@enderror
            </div>

            <div class="form-field">
                <label class="form-label" for="course_id">Select Course</label>
                <select id="course_id" name="course_id" class="form-input" required>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}" {{ old('course_id', $enrollment->course_id) == $course->id ? 'selected' : '' }}>
                            {{ $course->course_name }}
                        </option>
                    @endforeach
                </select>
                @error('course_id')<span class="form-error">{{ $message }}</span>@enderror
            </div>

            <div class="form-field">
                <label class="form-label" for="enrollment_date">Enrollment Date</label>
                <input type="date" id="enrollment_date" name="enrollment_date" class="form-input"
                    value="{{ old('enrollment_date', $enrollment->enrollment_date) }}" required>
                @error('enrollment_date')<span class="form-error">{{ $message }}</span>@enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-update">Update Enrollment</button>
                <a href="{{ route('enrollments.index') }}" class="btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
@endsection