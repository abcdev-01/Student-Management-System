@extends('layouts.app')

@section('title', 'Register Student')

@section('content')
    <div class="nav-links">
        <a href="{{ route('students.index') }}">Students</a>
        <a href="{{ route('courses.index') }}">Courses</a>
        <a href="{{ route('enrollments.index') }}">Enrollments</a>
    </div>

    <div class="card">
        <h2>Register Student</h2>

        <form action="{{ route('students.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" id="age" name="age" value="{{ old('age') }}" required min="16" max="120">
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" required>
                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <div class="form-group">
                <label for="registration_date">Registration Date</label>
                <input type="date" id="registration_date" name="registration_date"
                    value="{{ old('registration_date', date('Y-m-d')) }}" required>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" required>
                    <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Graduated" {{ old('status') == 'Graduated' ? 'selected' : '' }}>Graduated</option>
                    <option value="Dropped" {{ old('status') == 'Dropped' ? 'selected' : '' }}>Dropped</option>
                </select>
            </div>

            <button type="submit">Save Student</button>
            <a href="{{ route('students.index') }}" class="btn-secondary" style="margin-left:8px;">Cancel</a>
        </form>
    </div>
@endsection