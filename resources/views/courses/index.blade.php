<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Courses List</h2>
        <a href="{{ route('courses.create') }}" class="btn btn-primary px-4">+ Add New Course</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
    @endif

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-hover table-striped align-middle mb-0">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Course Title</th>
                    <th>Course Code</th>
                    <th>Description</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($courses as $course)
                    <tr>
                        <td>{{ $course->id }}</td>
                        <td class="fw-semibold">{{ $course->title }}</td>
                        <td><span class="badge bg-secondary px-2 py-1">{{ $course->code }}</span></td>
                        <td class="text-muted">{{ $course->description ?? 'No description provided' }}</td>
                        <td class="text-center">
                            <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                            
                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this course?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">No courses available. Click "Add New Course" to create one.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>
</html>