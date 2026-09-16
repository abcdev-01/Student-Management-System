<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Management System</title>
</head>

<body>
    <h1>Edit Student</h1>

    @if($errors->any())
        <ul style="color:red">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>First Name:</label>
        <input type="text" name="first_name" value="{{ old('first_name', $student->first_name) }}">
        <label>Last Name:</label>
        <input type="text" name="last_name" value="{{ old('last_name', $student->last_name) }}">
        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email', $student->email) }}">
        <label>Age:</label>
        <input type="number" name="age" value="{{ old('age', $student->age) }}">
        <label>Course:</label>
        <input type="text" name="course" value="{{ old('course', $student->course) }}">
        <button type=" submit">Update</button>
    </form>

    <a href="{{ route('students.index') }}">Back</a>
</body>

</html>