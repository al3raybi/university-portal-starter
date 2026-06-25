{{--
    YOUR TASK (W10 + W13):  list every student.

    The controller passes in:
        $students  — an array of App\DTOs\StudentDTO

    Each StudentDTO gives you:
        getId(), getName(), getEmail(), getStudentNumber(),
        getDepartmentId(), getDepartmentName()

    Build a table (loop with @foreach), with for each row:
        - an "Edit" link    -> route('students.edit', $student->getId())
        - a "Delete" <form> (POST + @csrf + @method('DELETE'))
              action -> route('students.destroy', $student->getId())
    Plus a "New Student" link -> route('students.create').

    Tip: getDepartmentName() may be null if the student has no department.

    TODO: build the view here.
--}}
@extends('layouts.app')

@section('title', 'Students Management - University Portal')

@section('content')
{{-- The inline max-width style prevents the 650px limitation and expands the layout comfortably --}}
<div class="container" style="padding: 10px; font-family: 'Open Sans', sans-serif; width: 100%; max-width: 1100px !important;">
    
    {{-- Header Panel --}}
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; border-bottom: 1px solid rgba(201,168,76,0.2); padding-bottom: 15px;">
        <div>
            <h2 style="margin: 0; color: #FFFFFF; font-family: 'Montserrat', sans-serif; font-size: 24px; font-weight: 700;">Students Registry</h2>
            <p style="margin: 5px 0 0 0; color: #8A94A6; font-size: 13px;">Manage and view all registered student records</p>
        </div>
        <a href="{{ route('students.create') }}" style="background: linear-gradient(135deg, #C9A84C 0%, #A8893A 100%); color: #0D1B3E; padding: 10px 20px; text-decoration: none; border-radius: 8px; font-family: 'Montserrat', sans-serif; font-weight: 700; font-size: 13px; box-shadow: 0 4px 12px rgba(201,168,76,0.2); transition: 0.2s;">
            + ADD NEW STUDENT
        </a>
    </div>

    {{-- System Flash Messages --}}
    @if(session('success'))
        <div style="background-color: rgba(201,168,76,0.1); color: #E2C06A; padding: 12px 20px; margin-bottom: 20px; border-radius: 8px; border: 1px solid rgba(201,168,76,0.25); font-size: 14px;">
            ✓ {{ session('success') }}
        </div>
    @endif

    {{-- Dark Data Table Container matching the theme --}}
    <div style="background: #162347; border: 1px solid rgba(201,168,76,0.15); border-radius: 12px; overflow-x: auto; box-shadow: 0 10px 30px rgba(0,0,0,0.25);">
        <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 14px; min-width: 800px;">
            <thead>
                <tr style="background-color: #0D1B3E; border-bottom: 2px solid rgba(201,168,76,0.2); color: #E2C06A; font-family: 'Montserrat', sans-serif;">
                    <th style="padding: 16px 20px; font-weight: 700;">ID</th>
                    <th style="padding: 16px 20px; font-weight: 700;">Student Number</th>
                    <th style="padding: 16px 20px; font-weight: 700;">Full Name</th>
                    <th style="padding: 16px 20px; font-weight: 700;">Email Address</th>
                    <th style="padding: 16px 20px; font-weight: 700;">Department</th>
                    <th style="padding: 16px 20px; font-weight: 700; text-align: center;">Actions</th>
                </tr>
            </thead>
            <tbody style="color: #CBD5E1;">
                @forelse($students as $student)
                    <tr style="border-bottom: 1px solid rgba(255,255,255,0.05); transition: background 0.2s;" onmouseover="this.style.backgroundColor='rgba(255,255,255,0.02)'" onmouseout="this.style.backgroundColor='transparent'">
                        <td style="padding: 16px 20px; font-weight: 600; color: #FFFFFF;">#{{ $student->getId() }}</td>
                        <td style="padding: 16px 20px;">
                            <span style="background-color: #1E2F5C; padding: 4px 8px; border-radius: 6px; font-family: monospace; font-size: 13px; color: #E2C06A; border: 1px solid rgba(201,168,76,0.15);">
                                {{ $student->getStudentNumber() ?? 'N/A' }}
                            </span>
                        </td>
                        <td style="padding: 16px 20px; font-weight: 600; color: #FFFFFF;">{{ $student->getName() }}</td>
                        <td style="padding: 16px 20px; color: #8A94A6;">{{ $student->getEmail() }}</td>
                        <td style="padding: 16px 20px;">
                            @if(method_exists($student, 'getDepartmentName') && $student->getDepartmentName())
                                <span style="background-color: rgba(201,168,76,0.12); color: #E2C06A; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; border: 1px solid rgba(201,168,76,0.2);">
                                    {{ $student->getDepartmentName() }}
                                </span>
                            @else
                                <span style="color: #8A94A6; font-size: 13px; font-style: italic;">
                                    Unassigned
                                </span>
                            @endif
                        </td>
                        <td style="padding: 16px 20px; text-align: center;">
                            <div style="display: flex; justify-content: center; gap: 10px;">
                                <a href="{{ route('students.edit', $student->getId()) }}" style="color: #0D1B3E; background-color: #E2C06A; padding: 6px 14px; text-decoration: none; border-radius: 6px; font-size: 12px; font-weight: 700; font-family: 'Montserrat', sans-serif; transition: 0.2s;">
                                    EDIT
                                </a>
                                {{-- Modernized delete form targeting JavaScript --}}
                                <form action="{{ route('students.destroy', $student->getId()) }}" method="POST" class="delete-form" style="margin: 0;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn-delete" style="color: #FFFFFF; background-color: #1E2F5C; border: 1px solid rgba(255,255,255,0.1); padding: 6px 14px; border-radius: 6px; font-size: 12px; font-weight: 700; font-family: 'Montserrat', sans-serif; cursor: pointer; transition: 0.2s;" onmouseover="this.style.backgroundColor='#b91c1c'" onmouseout="this.style.backgroundColor='#1E2F5C'">
                                        DELETE
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="padding: 50px; text-align: center; color: #8A94A6; font-style: italic; background-color: #0D1B3E;">
                            No student records available in the system.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- SweetAlert2 Library CDN for custom centered popups --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Custom JavaScript Logic for Handling Delete Interception --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Intercept all custom delete buttons in the table
    const deleteButtons = document.querySelectorAll('.btn-delete');
    
    deleteButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            const form = this.closest('.delete-form');
            
            // Trigger the tailored center popup modal matching navy/gold theme
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this student record!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#A8893A', // Corporate Gold
                cancelButtonColor: '#1E2F5C',  // Deep Navy
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel',
                background: '#162347',         // Matches table background
                color: '#FFFFFF',              // White typography
                iconColor: '#C9A84C',          // Gold tinted warning sign
                customClass: {
                    popup: 'custom-swal-popup'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Submit the form only if student confirms
                }
            });
        });
    });
});
</script>

{{-- Custom CSS Injection for the SweetAlert modal popup styling --}}
<style>
.custom-swal-popup {
    font-family: 'Montserrat', 'Open Sans', sans-serif !important;
    border: 1px solid rgba(201,168,76,0.2) !important;
    border-radius: 12px !important;
}
</style>
@endsection