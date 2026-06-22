@extends('layouts.layout')

@section('title', 'Departments — University Portal')

@section('content')

<div class="dept-page">

    {{-- Page Header --}}
    <div class="page-header">
        <div>
            <p class="page-eyebrow">Management</p>
            <h1 class="page-title">Departments</h1>
        </div>
        <x-button-primary href="{{ route('departments.create') }}">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"/>
                <line x1="5" y1="12" x2="19" y2="12"/>
            </svg>
            Add Department
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
        @if (count($departments) === 0)
            <div class="empty-state">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                    <polyline points="9 22 9 12 15 12 15 22"/>
                </svg>
                <p>No departments yet.</p>
                <x-button-primary href="{{ route('departments.create') }}">
                    Add First Department
                </x-button-primary>
            </div>
        @else
<x-table>
    <x-slot name="heading">
        <tr>
            <th>#</th>
            <th>Department Name</th>
            <th>Actions</th>
        </tr>
    </x-slot>

    @foreach ($departments as $dept)
        <tr>
            <td class="td-id">{{ $dept->getId() }}</td>
            <td class="td-name">{{ $dept->getName() }}</td>
            <td class="td-actions">
                <x-button-edit
                    href="{{ route('departments.edit', $dept->getId()) }}"
                    label="Edit"
                />
                <x-button-delete
                    action="{{ route('departments.destroy', $dept->getId()) }}"
                    label="Delete"
                    confirm="Delete this department?"
                />
            </td>
        </tr>
    @endforeach
</x-table>
        @endif
    </div>
</div>

@endsection