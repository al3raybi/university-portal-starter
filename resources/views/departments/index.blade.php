@extends('layouts.layout')

@section('title', 'Departments — University Portal')

@section('content')

<div class="dept-page">

    <div class="page-header">
        <div>
            <p class="page-eyebrow">Management</p>
            <h1 class="page-title">Departments</h1>
        </div>
        <x-button-primary :href="route('departments.create')">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
            </svg>
            Add Department
        </x-button-primary>
    </div>

    @if (session('success'))
        <div class="alert-success">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    <x-search-box placeholder="Search departments..." />

    <div class="table-card">
        @if (count($departments) > 0)
            <x-table>
                <x-slot:heading>
                    <tr>
                        <th>#</th>
                        <th>Department Name</th>
                        <th>Actions</th>
                    </tr>
                </x-slot:heading>

                @foreach ($departments as $department)
                    <tr>
                        <td class="td-id">{{ $department->getId() }}</td>
                        <td class="td-name">{{ $department->getName() }}</td>
                        <td class="td-actions">
                            <x-button-edit :href="route('departments.edit', $department->getId())" />
                            <x-button-delete :action="route('departments.destroy', $department->getId())" />
                        </td>
                    </tr>
                @endforeach
            </x-table>
        @else
            <div class="empty-state">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>
                </svg>
                <p>No departments yet. Click "Add Department" to create one.</p>
            </div>
        @endif
    </div>

</div>

@endsection