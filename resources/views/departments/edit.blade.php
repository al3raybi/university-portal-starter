@extends('layouts.layout')

@section('title', 'Edit Department — University Portal')

@section('content')

<div class="dept-page">

    {{-- Page Header --}}
    <div class="page-header">
        <div>
            <p class="page-eyebrow">Management</p>
            <h1 class="page-title">Edit Department</h1>
        </div>
        <a href="{{ route('departments.index') }}" class="btn-back">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="15 18 9 12 15 6"/>
            </svg>
            Back
        </a>
    </div>

    {{-- Form Card --}}
    <x-card
        action="{{ route('departments.update', $department->getId()) }}"
        method="PUT"
    >

        <x-form-input
            name="name"
            label="Department Name"
            placeholder="e.g. Computer Science"
            :value="$department->getName()"
            required
            autofocus
        >
            <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                <polyline points="9 22 9 12 15 12 15 22"/>
            </svg>
        </x-form-input>

        <div class="form-actions">
            <a href="{{ route('departments.index') }}" class="btn-cancel">Cancel</a>
            <x-button-primary type="submit">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"/>
                </svg>
                Update Department
            </x-button-primary>
        </div>

    </x-card>

</div>

@endsection