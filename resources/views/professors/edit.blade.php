{{--
    YOUR TASK (W10):  form to edit an existing professor.

    The controller passes in:
        $professor          — an App\DTOs\ProfessorDTO (getters listed in professors/index)
        $departmentOptions  — an array of [id => name]

    Submit with:
        method="POST" + @csrf + @method('PUT')
        action="{{ route('professors.update', $professor->getId()) }}"

    Pre-fill each input from the DTO and pre-select the current department
    ($professor->getDepartmentId()).

    Validated fields:  name, email, department_id

    TODO: build the form here.
--}}
@extends('layouts.layout')

@section('title', 'Edit Professor — University Portal')

@section('content')

<div class="dept-page">

    {{-- Page Header --}}
    <div class="page-header">
        <div>
            <p class="page-eyebrow">Management</p>
            <h1 class="page-title">Edit Professor</h1>
        </div>
        <a href="{{ route('professors.index') }}" class="btn-back">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="15 18 9 12 15 6"/>
            </svg>
            Back
        </a>
    </div>

    {{-- Form Card (PUT) --}}
    <x-card action="{{ route('professors.update', $professor->getId()) }}" method="PUT">

        {{-- Full Name --}}
        <x-form-input
            name="name"
            label="Full Name"
            placeholder="e.g. Dr. Sarah Ahmed"
            :value="$professor->getName()"
            required
        >
            <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                <circle cx="12" cy="7" r="4"/>
            </svg>
        </x-form-input>

        {{-- Email --}}
        <x-form-input
            name="email"
            label="Email Address"
            type="email"
            placeholder="e.g. sarah.ahmed@uni.edu"
            :value="$professor->getEmail()"
            required
        >
            <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 4h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z"/>
                <polyline points="22,6 12,13 2,6"/>
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
                            {{ (string) old('department_id', $professor->getDepartmentId()) === (string) $id ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
            </div>
            @error('department_id') <span class="field-error" style="display:block">{{ $message }}</span> @enderror
        </div>

        {{-- Actions --}}
        <div class="form-actions">
            <a href="{{ route('professors.index') }}" class="btn-cancel">Cancel</a>
            <x-button-primary type="submit">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"/>
                </svg>
                Update Professor
            </x-button-primary>
        </div>

    </x-card>

</div>

@endsection
