{{--
    YOUR TASK (W10):  form to edit an existing student.

    The controller passes in:
        $student            — an App\DTOs\StudentDTO (getters listed in students/index)
        $departmentOptions  — an array of [id => name]

    Submit with:
        method="POST" + @csrf + @method('PUT')
        action="{{ route('students.update', $student->getId()) }}"

    Pre-fill each input from the DTO (e.g. :value="$student->getName()") and
    pre-select the student's current department ($student->getDepartmentId()).

    Validated fields:  name, email, student_number, department_id

    TODO: build the form here.
--}}
@extends('layouts.layout')

@section('title', 'Edit Student — University Portal')

@section('content')

<div class="dept-page">

    {{-- Page Header --}}
    <div class="page-header">
        <div>
            <p class="page-eyebrow">Management</p>
            <h1 class="page-title">Edit Student Record</h1>
        </div>
        <a href="{{ route('students.index') }}" class="btn-back">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="15 18 9 12 15 6"/>
            </svg>
            Back
        </a>
    </div>

    {{-- Form Card --}}
    <x-card
        action="{{ route('students.update', $student->getId()) }}"
        method="PUT"
    >

        <x-form-input
            name="student_number"
            label="Student Number"
            :value="$student->getStudentNumber()"
            required
        />

        <x-form-input
            name="name"
            label="Full Name"
            :value="$student->getName()"
            required
        />

        <x-form-input
            name="email"
            label="Email Address"
            type="email"
            :value="$student->getEmail()"
            required
        />

        <div class="form-group">
            <label for="department_id">Department Assignment (Optional)</label>
            <div class="input-wrapper">
                <select name="department_id" id="department_id">
                    <option value="">-- Select a Department (None) --</option>
                    @foreach ($departmentOptions as $id => $name)
                        <option value="{{ $id }}" {{ old('department_id', $student->getDepartmentId()) == $id ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-actions">
            <a href="{{ route('students.index') }}" class="btn-cancel">Cancel</a>
            <x-button-primary type="submit">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"/>
                </svg>
                Update Record
            </x-button-primary>
        </div>

    </x-card>

</div>

@endsection
