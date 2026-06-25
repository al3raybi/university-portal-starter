@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

    <div class="card p-4 shadow-sm mx-auto" style="max-width: 600px;">
        <h2 class="mb-4 text-center fw-bold text-dark">Edit Course Details</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('courses.update', $course->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-semibold">Course Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $course->title) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Course Code</label>
                <input type="text" name="code" class="form-control" value="{{ old('code', $course->code) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Description</label>
                <textarea name="description" class="form-control" rows="4">{{ old('description', $course->description) }}</textarea>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-warning px-4">Update Course</button>
                <a href="{{ route('courses.index') }}" class="btn btn-secondary px-4">Cancel</a>
            </div>
        </form>
    </div>

</body>
</html>
@endsection