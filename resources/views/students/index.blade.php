{{--
    YOUR TASK (W10 + W13):  list every student.

    The controller passes in:
        $students  — an array of App\DTOs\StudentDTO

    Each StudentDTO gives you:
        getId(), getName(), getEmail(), getStudentNumber(),
        getDepartmentId(), getDepartmentName()

    Build a table (loop with @foreach), with for each row:
        - an "Edit" link    -> route('students.edit', $student->getId())
        - a "Delete" <form> (POST + @csrf + @method('DELETE'))
              action -> route('students.destroy', $student->getId())
    Plus a "New Student" link -> route('students.create').

    Tip: getDepartmentName() may be null if the student has no department.

    TODO: build the view here.
--}}
@extends('layouts.layout')

@section('title', 'Students Management — University Portal')

@section('content')

<div class="dept-page">

    {{-- Page Header --}}
    <div class="page-header">
        <div>
            <p class="page-eyebrow">Management</p>
            <h1 class="page-title">Students Registry</h1>
        </div>
        <x-button-primary href="{{ route('students.create') }}">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"/>
                <line x1="5" y1="12" x2="19" y2="12"/>
            </svg>
            Add New Student
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
        @if (count($students) === 0)
            <div class="empty-state">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
                <p>No student records available.</p>
                <x-button-primary href="{{ route('students.create') }}">
                    Add First Student
                </x-button-primary>
            </div>
        @else
            <x-table>
                <x-slot name="heading">
                    <tr>
                        <th>ID</th>
                        <th>Student Number</th>
                        <th>Full Name</th>
                        <th>Email Address</th>
                        <th>Department</th>
                        <th>Actions</th>
                    </tr>
                </x-slot>

                @foreach ($students as $student)
                    <tr>
                        <td class="td-id">#{{ $student->getId() }}</td>
                        <td class="td-name">{{ $student->getStudentNumber() ?? 'N/A' }}</td>
                        <td class="td-name">{{ $student->getName() }}</td>
                        <td>{{ $student->getEmail() }}</td>
                        <td>
                            @if (method_exists($student, 'getDepartmentName') && $student->getDepartmentName())
                                <span style="background: rgba(201,168,76,0.12); color: var(--gold); padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; border: 1px solid rgba(201,168,76,0.2);">
                                    {{ $student->getDepartmentName() }}
                                </span>
                            @else
                                <span style="color: var(--gray-text); font-size: 13px; font-style: italic;">Unassigned</span>
                            @endif
                        </td>
                        <td class="td-actions">
                            <x-button-edit
                                href="{{ route('students.edit', $student->getId()) }}"
                                label="Edit"
                            />
                            <x-button-delete
                                action="{{ route('students.destroy', $student->getId()) }}"
                                label="Delete"
                                confirm="Delete this student record?"
                            />
                        </td>
                    </tr>
                @endforeach
            </x-table>
        @endif
    </div>

</div>

@endsection