@extends('layouts.layout')

@section('title', 'Create Course — University Portal')

@section('content')

<div class="dept-page">

    {{-- Page Header --}}
    <div class="page-header">
        <div>
            <p class="page-eyebrow">Management</p>
            <h1 class="page-title">Add New Course</h1>
        </div>
        <a href="{{ route('courses.index') }}" class="btn-back">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="15 18 9 12 15 6"/>
            </svg>
            Back
        </a>
    </div>

    {{-- Form Card --}}
    <x-card action="{{ route('courses.store') }}">

        <x-form-input
            name="title"
            label="Course Title"
            placeholder="e.g., Advanced Web Development"
            required
            autofocus
        />

        <x-form-input
            name="course_code"
            label="Course Code"
            placeholder="e.g., CS-302"
            required
        />

        <x-form-input
            name="credit_hours"
            label="Credit Hours"
            type="number"
            placeholder="e.g., 3"
            value="3"
            required
        />

        <div class="form-actions">
            <a href="{{ route('courses.index') }}" class="btn-cancel">Cancel</a>
            <x-button-primary type="submit">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"/>
                </svg>
                Save Course
            </x-button-primary>
        </div>

    </x-card>

</div>

@endsection