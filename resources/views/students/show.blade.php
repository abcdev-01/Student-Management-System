<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Management System</title>
</head>

<body>
    <h1>Welcome to Student Management System, Mr. {{ $student->name }}</h1>

    <p><strong>ID:</strong> {{ $student->id }}</p>
    <p><strong>Name:</strong> {{ $student->name }}</p>

    <a href="{{ route('students.index') }}">Back to Students</a>
</body>

</html>