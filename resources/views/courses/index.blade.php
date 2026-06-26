@extends('layouts.layout')

@section('title', 'Courses — University Portal')

@section('content')

<div class="dept-page">

    {{-- Page Header --}}
    <div class="page-header">
        <div>
            <p class="page-eyebrow">Management</p>
            <h1 class="page-title">Courses</h1>
        </div>
        <x-button-primary href="{{ route('courses.create') }}">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"/>
                <line x1="5" y1="12" x2="19" y2="12"/>
            </svg>
            Add New Course
        </x-button-primary>
    </div>

    {{-- Success Alert --}}
    @if (session('success'))
        <div class="alert-success">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12"/>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    {{-- Table --}}
    <div class="table-card">
        @if (count($courses) === 0)
            <div class="empty-state">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                </svg>
                <p>No courses available.</p>
                <x-button-primary href="{{ route('courses.create') }}">
                    Add First Course
                </x-button-primary>
            </div>
        @else
            <x-table>
                <x-slot name="heading">
                    <tr>
                        <th>ID</th>
                        <th>Course Title</th>
                        <th>Course Code</th>
                        <th>Credit Hours</th>
                        <th>Department</th>
                        <th>Actions</th>
                    </tr>
                </x-slot>

                @foreach ($courses as $course)
                    <tr>
                        <td class="td-id">{{ $course->getId() }}</td>
                        <td class="td-name">{{ $course->getTitle() }}</td>
                        <td>{{ $course->getCourseCode() }}</td>
                        <td>{{ $course->getCreditHours() }}</td>
                        <td>{{ $course->getDepartmentName() ?? 'N/A' }}</td>
                        <td class="td-actions">
                            <x-button-edit
                                href="{{ route('courses.edit', $course->getId()) }}"
                                label="Edit"
                            />
                            <x-button-delete
                                action="{{ route('courses.destroy', $course->getId()) }}"
                                label="Delete"
                                confirm="Are you sure you want to delete this course?"
                            />
                        </td>
                    </tr>
                @endforeach
            </x-table>
        @endif
    </div>

</div>

@endsection