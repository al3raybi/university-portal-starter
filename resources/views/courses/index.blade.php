@extends('layouts.layout')

@section('title', 'Courses — University Portal')

@section('content')

<div class="dept-page">

    <div class="page-header">
        <div>
            <p class="page-eyebrow">Management</p>
            <h1 class="page-title">Courses</h1>
        </div>
        <x-button-primary :href="route('courses.create')">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
            </svg>
            Add New Course
        </x-button-primary>
    </div>

    @if (session('success'))
        <div class="alert-success">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    <x-search-box placeholder="Search courses..." />

    <div class="table-card">
        @if (count($courses) > 0)
            <x-table>
                <x-slot:heading>
                    <tr>
                        <th>ID</th>
                        <th>Course Title</th>
                        <th>Course Code</th>
                        <th>Credit Hours</th>
                        <th>Actions</th>
                    </tr>
                </x-slot:heading>

                @foreach ($courses as $course)
                    <tr>
                        <td class="td-id">#{{ $course->getId() }}</td>
                        <td class="td-name">{{ $course->getTitle() }}</td>
                        <td>{{ $course->getCourseCode() }}</td>
                        <td>{{ $course->getCreditHours() }}</td>
                        <td class="td-actions">
                            <x-button-edit :href="route('courses.edit', $course->getId())" />
                            <x-button-delete :action="route('courses.destroy', $course->getId())" />
                        </td>
                    </tr>
                @endforeach
            </x-table>
        @else
            <div class="empty-state">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                </svg>
                <p>No courses yet. Click "Add New Course" to create one.</p>
            </div>
        @endif
    </div>

</div>

@endsection