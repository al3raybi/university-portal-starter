@extends('layouts.layout')

@section('title', 'Enrollments — University Portal')

@section('content')

<div class="dept-page">

    <div class="page-header">
        <div>
            <p class="page-eyebrow">Management</p>
            <h1 class="page-title">Enrollments Registry</h1>
        </div>
        <x-button-primary :href="route('enrollments.create')">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
            </svg>
            Add New Enrollment
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

    <x-search-box placeholder="Search enrollments..." />

    <div class="table-card">
        @if (count($enrollments) > 0)
            <x-table>
                <x-slot:heading>
                    <tr>
                        <th>ID</th>
                        <th>Student</th>
                        <th>Course</th>
                        <th>Grade</th>
                        <th>Actions</th>
                    </tr>
                </x-slot:heading>

                @foreach ($enrollments as $enrollment)
                    <tr>
                        <td class="td-id">#{{ $enrollment->getId() }}</td>
                        <td class="td-name">{{ $enrollment->getStudentName() }}</td>
                        <td>
                            {{ $enrollment->getCourseTitle() }}
                            @if ($enrollment->getCourseCode())
                                ({{ $enrollment->getCourseCode() }})
                            @endif
                        </td>
                        <td>{{ $enrollment->getGrade() ?: '—' }}</td>
                        <td class="td-actions">
                            <x-button-edit :href="route('enrollments.edit', $enrollment->getId())" />
                            <x-button-delete :action="route('enrollments.destroy', $enrollment->getId())" />
                        </td>
                    </tr>
                @endforeach
            </x-table>
        @else
            <div class="empty-state">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/>
                </svg>
                <p>No enrollments yet. Click "Add New Enrollment" to create one.</p>
            </div>
        @endif
    </div>

</div>

@endsection