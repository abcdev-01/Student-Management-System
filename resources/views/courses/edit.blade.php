<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student management system</title>
</head>

<body>
    @if($errors->any())
        <ul style="color:red">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('courses.update', $course->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="course_name">Course Name</label>
            <input type="text" name="course_name" id="course_name" value="{{ $course->course_name }}" required>
        </div>
        <div>
            <label for="course_code">Course Code</label>
            <input type="text" name="course_code" id="course_code" value="{{ $course->course_code }}" required>
        </div>
        <div>
            <label for="duration">Duration</label>
            <input type="text" name="duration" id="duration" value="{{ $course->duration }}" required>
        </div>
        <div>
            <label for="status">Status</label>
            <select name="status" id="status" required>
                <option value="active" {{ $course->status === 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $course->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <button type="submit">Update Course</button>
    </form>
</body>

</html>