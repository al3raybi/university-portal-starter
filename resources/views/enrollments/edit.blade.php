@extends('layouts.layout')

@section('title', 'Edit Enrollment — University Portal')

@section('content')

<div class="dept-page">

    <div class="page-header">
        <div>
            <p class="page-eyebrow">Management</p>
            <h1 class="page-title">Edit Enrollment</h1>
        </div>
        <a href="{{ route('enrollments.index') }}" class="btn-back">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="15 18 9 12 15 6"/>
            </svg>
            Back
        </a>
    </div>

    <x-card action="{{ route('enrollments.update', $enrollment->getId()) }}" method="PUT">

        {{-- Student --}}
        <div class="form-group">
            <label for="student_id">Student</label>
            <div class="input-wrapper">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                    <circle cx="12" cy="7" r="4"/>
                </svg>
                <select name="student_id" id="student_id" required>
                    <option value="">-- Select a Student --</option>
                    @foreach ($studentOptions as $id => $name)
                        <option value="{{ $id }}"
                            {{ (string) old('student_id', $enrollment->getStudentId()) === (string) $id ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
            </div>
            @error('student_id') <span class="field-error" style="display:block">{{ $message }}</span> @enderror
        </div>

        {{-- Course --}}
        <div class="form-group">
            <label for="course_id">Course</label>
            <div class="input-wrapper">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
                    <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                </svg>
                <select name="course_id" id="course_id" required>
                    <option value="">-- Select a Course --</option>
                    @foreach ($courseOptions as $id => $name)
                        <option value="{{ $id }}"
                            {{ (string) old('course_id', $enrollment->getCourseId()) === (string) $id ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
            </div>
            @error('course_id') <span class="field-error" style="display:block">{{ $message }}</span> @enderror
        </div>

        {{-- Grade (optional) --}}
        <x-form-input
            name="grade"
            label="Grade (Optional)"
            placeholder="e.g. A, B+, 95"
            :value="$enrollment->getGrade()"
        >
            <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 2l2.4 7.4H22l-6 4.6 2.3 7.4-6.3-4.6L5.7 21.4 8 14 2 9.4h7.6z"/>
            </svg>
        </x-form-input>

        <div class="form-actions">
            <a href="{{ route('enrollments.index') }}" class="btn-cancel">Cancel</a>
            <x-button-primary type="submit">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"/>
                </svg>
                Update Enrollment
            </x-button-primary>
        </div>

    </x-card>

</div>

@endsection