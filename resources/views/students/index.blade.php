@extends('layouts.layout')

@section('title', 'Students — University Portal')

@section('content')

<div class="dept-page">

    <div class="page-header">
        <div>
            <p class="page-eyebrow">Management</p>
            <h1 class="page-title">Students Registry</h1>
        </div>
        <x-button-primary :href="route('students.create')">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
            </svg>
            Add New Student
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

    <x-search-box placeholder="Search students..." />

    <div class="table-card">
        @if (count($students) > 0)
            <x-table>
                <x-slot:heading>
                    <tr>
                        <th>ID</th>
                        <th>Student Number</th>
                        <th>Full Name</th>
                        <th>Email Address</th>
                        <th>Department</th>
                        <th>Actions</th>
                    </tr>
                </x-slot:heading>

                @foreach ($students as $student)
                    <tr>
                        <td class="td-id">#{{ $student->getId() }}</td>
                        <td>{{ $student->getStudentNumber() }}</td>
                        <td class="td-name">{{ $student->getName() }}</td>
                        <td>{{ $student->getEmail() }}</td>
                        <td>{{ $student->getDepartmentName() ?: '—' }}</td>
                        <td class="td-actions">
                            <x-button-edit :href="route('students.edit', $student->getId())" />
                            <x-button-delete :action="route('students.destroy', $student->getId())" />
                        </td>
                    </tr>
                @endforeach
            </x-table>
        @else
            <div class="empty-state">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/>
                </svg>
                <p>No students yet. Click "Add New Student" to create one.</p>
            </div>
        @endif
    </div>

</div>

@endsection