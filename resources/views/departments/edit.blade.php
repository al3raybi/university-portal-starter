{{--
    YOUR TASK (W10):  form to edit an existing department.

    The controller passes in:
        $department  — an App\DTOs\DepartmentDTO  (getId(), getName())

    Submit the form with:
        method="POST" + @csrf + @method('PUT')
        action="{{ route('departments.update', $department->getId()) }}"

    Pre-fill the input with the current value: $department->getName()
    Validated fields:  name (required)

    TODO: build the form here.
--}}
@extends('layouts.layout')

@section('title', 'Edit Department — University Portal')

@section('content')

<div class="dept-page">

    {{-- Page Header --}}
    <div class="page-header">
        <div>
            <p class="page-eyebrow">Departments</p>
            <h1 class="page-title">Edit Department</h1>
        </div>
        <a href="{{ route('departments.index') }}" class="btn-back">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="19" y1="12" x2="5" y2="12"/>
                <polyline points="12 19 5 12 12 5"/>
            </svg>
            Back
        </a>
    </div>

    {{-- Form Card --}}
    <div class="form-card">
        <form method="POST" action="{{ route('departments.update', $department->getId()) }}" novalidate>
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Department Name</label>
                <div class="input-wrapper">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                        <polyline points="9 22 9 12 15 12 15 22"/>
                    </svg>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        placeholder="e.g. Computer Science"
                        value="{{ old('name', $department->getName()) }}"
                        required
                        autofocus
                    >
                </div>
                @error('name')
                    <span class="field-error" style="display:block">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-actions">
                <a href="{{ route('departments.index') }}" class="btn-cancel">Cancel</a>
                <button type="submit" class="btn-primary">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"/>
                    </svg>
                    Update Department
                </button>
            </div>
        </form>
    </div>

</div>

@endsection

