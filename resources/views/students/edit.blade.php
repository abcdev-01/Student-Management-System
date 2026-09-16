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

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $student->first_name) }}">
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $student->last_name) }}">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email', $student->email) }}">
        <label for="age">Age:</label>
        <input type="number" name="age" id="age" value="{{ old('age', $student->age) }}">
        <label for="course">Course:</label>
        <input type="text" name="course" id="course" value="{{ old('course', $student->course) }}">
        <button type=" submit">Update</button>
    </form>

    <a href="{{ route('students.index') }}">Back</a>
</body>

</html>