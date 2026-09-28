@extends('layouts.app')

@section('title', 'Register Student')

@section('content')
    <div class="content-card narrow">
        <h2 class="card-heading">Register Student</h2>

        <form action="{{ route('students.store') }}" method="POST">
            @csrf

            <div class="form-field">
                <label class="form-label" for="full_name">Full Name</label>
                <input type="text" id="full_name" name="full_name" class="form-input"
                    value="{{ old('full_name') }}" required>
                @error('full_name')<span class="form-error">{{ $message }}</span>@enderror
            </div>

            <div class="form-field">
                <label class="form-label" for="email">Email Address</label>
                <input type="email" id="email" name="email" class="form-input"
                    value="{{ old('email') }}" required>
                @error('email')<span class="form-error">{{ $message }}</span>@enderror
            </div>

            <div class="form-field">
                <label class="form-label" for="age">Age</label>
                <input type="number" id="age" name="age" class="form-input"
                    value="{{ old('age') }}" required min="16" max="120">
                @error('age')<span class="form-error">{{ $message }}</span>@enderror
            </div>

            <div class="form-field">
                <label class="form-label" for="phone_number">Phone Number</label>
                <input type="text" id="phone_number" name="phone_number" class="form-input"
                    value="{{ old('phone_number') }}" required>
                @error('phone_number')<span class="form-error">{{ $message }}</span>@enderror
            </div>

            <div class="form-field">
                <label class="form-label" for="gender">Gender</label>
                <select id="gender" name="gender" class="form-input" required>
                    <option value="Male"   {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
                @error('gender')<span class="form-error">{{ $message }}</span>@enderror
            </div>

            <div class="form-field">
                <label class="form-label" for="registration_date">Registration Date</label>
                <input type="date" id="registration_date" name="registration_date" class="form-input"
                    value="{{ old('registration_date', date('Y-m-d')) }}" required>
                @error('registration_date')<span class="form-error">{{ $message }}</span>@enderror
            </div>

            <div class="form-field">
                <label class="form-label" for="status">Status</label>
                <select id="status" name="status" class="form-input" required>
                    <option value="Active"    {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Graduated" {{ old('status') == 'Graduated' ? 'selected' : '' }}>Graduated</option>
                    <option value="Dropped"   {{ old('status') == 'Dropped' ? 'selected' : '' }}>Dropped</option>
                </select>
                @error('status')<span class="form-error">{{ $message }}</span>@enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-save">Save Student</button>
                <a href="{{ route('students.index') }}" class="btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
@endsection