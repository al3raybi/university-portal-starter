{{--
    YOUR TASK (W10):  form to edit an existing student.

    The controller passes in:
        $student            — an App\DTOs\StudentDTO (getters listed in students/index)
        $departmentOptions  — an array of [id => name]

    Submit with:
        method="POST" + @csrf + @method('PUT')
        action="{{ route('students.update', $student->getId()) }}"

    Pre-fill each input from the DTO (e.g. :value="$student->getName()") and
    pre-select the student's current department ($student->getDepartmentId()).

    Validated fields:  name, email, student_number, department_id

    TODO: build the form here.
--}}
@extends('layouts.app')

@section('content')
<div class="container" style="padding: 10px; font-family: 'Open Sans', sans-serif; width: 100%; max-width: 650px !important;">
    
    {{-- Header Panel --}}
    <div style="margin-bottom: 25px; border-bottom: 1px solid rgba(201,168,76,0.2); padding-bottom: 15px;">
        <h2 style="margin: 0; color: #FFFFFF; font-family: 'Montserrat', sans-serif; font-size: 24px; font-weight: 700;">Edit Student Record</h2>
        <p style="margin: 5px 0 0 0; color: #8A94A6; font-size: 13px;">Modify the existing student profile and department assignment</p>
    </div>

    {{-- Form Container matching the dark navy and gold theme --}}
    <div style="background: #162347; border: 1px solid rgba(201,168,76,0.15); border-radius: 12px; padding: 25px; box-shadow: 0 10px 30px rgba(0,0,0,0.25);">
        <form action="{{ route('students.update', $student->getId()) }}" method="POST">
            @csrf
            @method('PUT')
            
            {{-- Student Number Input (NOW REQUIRED) --}}
            <div style="margin-bottom: 20px;">
                <label style="display: block; color: #E2C06A; font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 13px; margin-bottom: 8px;">STUDENT NUMBER *</label>
                <input type="text" name="student_number" value="{{ old('student_number', $student->getStudentNumber()) }}" required style="width: 100%; background: #0D1B3E; border: 1px solid rgba(201,168,76,0.2); border-radius: 6px; padding: 10px 12px; color: #FFFFFF; font-size: 14px; box-sizing: border-box;">
            </div>

            {{-- Full Name Input --}}
            <div style="margin-bottom: 20px;">
                <label style="display: block; color: #E2C06A; font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 13px; margin-bottom: 8px;">FULL NAME *</label>
                <input type="text" name="name" value="{{ old('name', $student->getName()) }}" required style="width: 100%; background: #0D1B3E; border: 1px solid rgba(201,168,76,0.2); border-radius: 6px; padding: 10px 12px; color: #FFFFFF; font-size: 14px; box-sizing: border-box;">
            </div>

            {{-- Email Address Input --}}
            <div style="margin-bottom: 20px;">
                <label style="display: block; color: #E2C06A; font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 13px; margin-bottom: 8px;">EMAIL ADDRESS *</label>
                <input type="email" name="email" value="{{ old('email', $student->getEmail()) }}" required style="width: 100%; background: #0D1B3E; border: 1px solid rgba(201,168,76,0.2); border-radius: 6px; padding: 10px 12px; color: #FFFFFF; font-size: 14px; box-sizing: border-box;">
            </div>

            {{-- Department Assignment Selection --}}
            <div style="margin-bottom: 25px;">
                <label style="display: block; color: #E2C06A; font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 13px; margin-bottom: 8px;">DEPARTMENT ASSIGNMENT (OPTIONAL)</label>
                <select name="department_id" style="width: 100%; background: #0D1B3E; border: 1px solid rgba(201,168,76,0.2); border-radius: 6px; padding: 10px 12px; color: #FFFFFF; font-size: 14px; box-sizing: border-box; cursor: pointer;">
                    <option value="" style="background: #0D1B3E; color: #8A94A6;">-- Select a Department (None) --</option>
                    @foreach ($departmentOptions as $id => $name)
                        <option value="{{ $id }}" style="background: #0D1B3E; color: #FFFFFF;" {{ old('department_id', $student->getDepartmentId()) == $id ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Action Buttons --}}
            <div style="display: flex; gap: 12px; border-top: 1px solid rgba(255,255,255,0.05); padding-top: 20px; justify-content: flex-end;">
                <a href="{{ route('students.index') }}" style="color: #CBD5E1; background: transparent; border: 1px solid rgba(255,255,255,0.15); padding: 10px 20px; text-decoration: none; border-radius: 6px; font-size: 13px; font-weight: 600; font-family: 'Montserrat', sans-serif; transition: 0.2s; display: inline-flex; align-items: center;">
                    CANCEL
                </a>
                <button type="submit" style="background: linear-gradient(135deg, #C9A84C 0%, #A8893A 100%); color: #0D1B3E; border: none; padding: 10px 24px; border-radius: 6px; font-family: 'Montserrat', sans-serif; font-weight: 700; font-size: 13px; cursor: pointer; box-shadow: 0 4px 12px rgba(201,168,76,0.15); transition: 0.2s;">
                    UPDATE RECORD
                </button>
            </div>
        </form>
    </div>
</div>
@endsection