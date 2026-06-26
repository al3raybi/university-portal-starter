@extends('layouts.layout')

@section('title', 'Add Student — University Portal')

@section('content')

<div class="dept-page">

    {{-- Page Header --}}
    <div class="page-header">
        <div>
            <p class="page-eyebrow">Management</p>
            <h1 class="page-title">Add New Student</h1>
        </div>
        <a href="{{ route('students.index') }}" class="btn-back">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="15 18 9 12 15 6"/>
            </svg>
            Back
        </a>
    </div>

    {{-- Form Card --}}
    <x-card action="{{ route('students.store') }}">

        <x-form-input
            name="student_number"
            label="Student Number"
            placeholder="e.g. S10025"
            required
        />

        <x-form-input
            name="name"
            label="Full Name"
            placeholder="e.g. Zainab Ali"
            required
        />

        <x-form-input
            name="email"
            label="Email Address"
            type="email"
            placeholder="e.g. zainab.ali@students.uni.edu"
            required
        />

        <div class="form-group">
            <label for="department_id">Department Assignment (Optional)</label>
            <div class="input-wrapper">
                <select name="department_id" id="department_id">
                    <option value="">-- Select a Department (None) --</option>
                    @foreach ($departmentOptions as $id => $name)
                        <option value="{{ $id }}" {{ old('department_id') == $id ? 'selected' : '' }}>
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
                Save Record
            </x-button-primary>
        </div>

    </x-card>

</div>

@endsection