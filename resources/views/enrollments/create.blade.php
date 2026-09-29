@extends('layouts.app')

@section('title', 'New Enrollment')

@section('content')
    <div class="content-card narrow">
        <h2 class="card-heading">Course Enrollment</h2>

        <form action="{{ route('enrollments.store') }}" method="POST">
            @csrf

            <div class="form-field">
                <label class="form-label" for="student_id">Select Student</label>
                <select id="student_id" name="student_id" class="form-input" required>
                    <option value="">-- Choose Student --</option>
                    @foreach($students as $student)
                        <option value="{{ $student->id }}" {{ old('student_id') == $student->id ? 'selected' : '' }}>
                            {{ $student->full_name }}
                        </option>
                    @endforeach
                </select>
                @error('student_id')<span class="form-error">{{ $message }}</span>@enderror
            </div>

            <div class="form-field">
                <label class="form-label" for="course_id">Select Course</label>
                <select id="course_id" name="course_id" class="form-input" required>
                    <option value="">-- Choose Course --</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                            {{ $course->course_name }}
                        </option>
                    @endforeach
                </select>
                @error('course_id')<span class="form-error">{{ $message }}</span>@enderror
            </div>

            <div class="form-field">
                <label class="form-label" for="enrollment_date">Enrollment Date</label>
                <input type="date" id="enrollment_date" name="enrollment_date" class="form-input"
                    value="{{ old('enrollment_date', date('Y-m-d H:i:s')) }}" required>
                @error('enrollment_date')<span class="form-error">{{ $message }}</span>@enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-save">Perform Enrollment</button>
                <a href="{{ route('enrollments.index') }}" class="btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
@endsection