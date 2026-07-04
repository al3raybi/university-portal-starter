@extends('layouts.layout')

@section('title', 'Edit Course — University Portal')

@section('content')

<div class="dept-page">

    <div class="page-header">
        <div>
            <p class="page-eyebrow">Management</p>
            <h1 class="page-title">Edit Course</h1>
        </div>
        <a href="{{ route('courses.index') }}" class="btn-back">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="15 18 9 12 15 6"/>
            </svg>
            Back
        </a>
    </div>

    <x-card action="{{ route('courses.update', $course->getId()) }}" method="PUT">

        {{-- Course Title --}}
        <x-form-input
            name="title"
            label="Course Title"
            placeholder="e.g., Advanced Web Development"
            :value="$course->getTitle()"
            required
        >
            <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
            </svg>
        </x-form-input>

        {{-- Course Code --}}
        <x-form-input
            name="course_code"
            label="Course Code"
            placeholder="e.g., CS-302"
            :value="$course->getCourseCode()"
            required
        >
            <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="16 18 22 12 16 6"/>
                <polyline points="8 6 2 12 8 18"/>
            </svg>
        </x-form-input>

        {{-- Credit Hours --}}
        <x-form-input
            name="credit_hours"
            label="Credit Hours"
            type="number"
            placeholder="3"
            :value="$course->getCreditHours()"
            required
        >
            <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"/>
                <polyline points="12 6 12 12 16 14"/>
            </svg>
        </x-form-input>

        {{-- Department --}}
        <div class="form-group">
            <label for="department_id">Department Assignment (Optional)</label>
            <div class="input-wrapper">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                    <polyline points="9 22 9 12 15 12 15 22"/>
                </svg>
                <select name="department_id" id="department_id">
                    <option value="">-- Select a Department (None) --</option>
                    @foreach ($departmentOptions as $id => $name)
                        <option value="{{ $id }}"
                            {{ (string) old('department_id', $course->getDepartmentId()) === (string) $id ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
            </div>
            @error('department_id') <span class="field-error" style="display:block">{{ $message }}</span> @enderror
        </div>

        {{-- Actions --}}
        <div class="form-actions">
            <a href="{{ route('courses.index') }}" class="btn-cancel">Cancel</a>
            <x-button-primary type="submit">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"/>
                </svg>
                Update Course
            </x-button-primary>
        </div>

    </x-card>

</div>

@endsection