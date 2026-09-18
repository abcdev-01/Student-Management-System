<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Management System</title>
</head>

<body>
    <h1>Add Student</h1>

    @if($errors->any())
        <ul style="color:red">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name" placeholder="Enter first name">
        <label for=" last_name">Last Name:</label>
        <input type="text" name="last_name" id="last_name" placeholder="Enter last name">
        <label for=" email">Email:</label>
        <input type="email" name="email" id="email" placeholder="xxxx@gmail.com">
        <label for=" phone_number">Phone Number:</label>
        <input type="phone" name="phone_number" id="phone_number" placeholder="07xxxxxxx">
        <label for=" age">Age:</label>
        <input type="number" name="age" id="age" placeholder="Enter Age">
        <label for=" gender">Gender</label>
        <select name="gender" id="gender">
            <option value="">Select a Gender</option>
            <option value="Male">male</option>
            <option value="Female">Female</option>
        </select>
        <label for="course_id">Course:</label>
        <select name="course_id" id="course_id">
            <option value="">Select a Course</option>
            @foreach($courses as $course)
                <option value="{{ $course->id }}">{{ $course->course_name }}</option>
            @endforeach
        </select>
        <label for=" status">Status</label>
        <select name="status" id="status">
            <option value="">Select a Status</option>
            <option value="active">Active</option>
            <option value="graduated">Graduated</option>
            <option value="dropped">Dropped</option>
        </select>
        <button type=" submit">Save</button>
    </form>

    <a href="{{ route('students.index') }}">Back</a>
</body>

</html>