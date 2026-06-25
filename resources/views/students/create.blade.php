{{--
    YOUR TASK (W10):  form to create a new student.

    The controller passes in:
        $departmentOptions  — an array of  [id => name]  for a dropdown

    Submit with:
        method="POST"  action="{{ route('students.store') }}"  @csrf

    Validated fields (use these as input name=""):
        name            (required)
        email           (required, must be an email)
        student_number  (optional)
        department_id   (optional)

    For department_id, build a <select> by looping $departmentOptions:
        @foreach ($departmentOptions as $id => $name) ... @endforeach

    TODO: build the form here.@extends('layouts.app')

@section('content')
<div class="container" style="padding: 10px; font-family: 'Open Sans', sans-serif; width: 100%; max-width: 650px !important;">
    <div style="margin-bottom: 25px; border-bottom: 1px solid rgba(201,168,76,0.2); padding-bottom: 15px;">
        <h2 style="margin: 0; color: #FFFFFF; font-family: 'Montserrat', sans-serif; font-size: 24px; font-weight: 700;">Add New Student</h2>
        <p style="margin: 5px 0 0 0; color: #8A94A6; font-size: 13px;">Enter student details to register them into the system</p>
    </div>

    <div style="background: #162347; border: 1px solid rgba(201,168,76,0.15); border-radius: 12px; padding: 25px; box-shadow: 0 10px 30px rgba(0,0,0,0.25);">
        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            
            <div style="margin-bottom: 20px;">
                <label style="display: block; color: #E2C06A; font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 13px; margin-bottom: 8px;">STUDENT NUMBER *</label>
                <input type="text" name="student_number" value="{{ old('student_number') }}" required placeholder="e.g. S10025" style="width: 100%; background: #0D1B3E; border: 1px solid rgba(201,168,76,0.2); border-radius: 6px; padding: 10px 12px; color: #FFFFFF; font-size: 14px; box-sizing: border-box;">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; color: #E2C06A; font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 13px; margin-bottom: 8px;">FULL NAME *</label>
                <input type="text" name="name" value="{{ old('name') }}" required placeholder="e.g. Zainab Ali" style="width: 100%; background: #0D1B3E; border: 1px solid rgba(201,168,76,0.2); border-radius: 6px; padding: 10px 12px; color: #FFFFFF; font-size: 14px; box-sizing: border-box;">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; color: #E2C06A; font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 13px; margin-bottom: 8px;">EMAIL ADDRESS *</label>
                <input type="email" name="email" value="{{ old('email') }}" required placeholder="e.g. zainab.ali@students.uni.edu" style="width: 100%; background: #0D1B3E; border: 1px solid rgba(201,168,76,0.2); border-radius: 6px; padding: 10px 12px; color: #FFFFFF; font-size: 14px; box-sizing: border-box;">
            </div>

            <div style="margin-bottom: 25px;">
                <label style="display: block; color: #E2C06A; font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 13px; margin-bottom: 8px;">DEPARTMENT ASSIGNMENT (OPTIONAL)</label>
                <select name="department_id" style="width: 100%; background: #0D1B3E; border: 1px solid rgba(201,168,76,0.2); border-radius: 6px; padding: 10px 12px; color: #FFFFFF; font-size: 14px; box-sizing: border-box; cursor: pointer;">
                    <option value="" style="background: #0D1B3E; color: #8A94A6;">-- Select a Department (None) --</option>
                    <option value="1" style="background: #0D1B3E; color: #FFFFFF;">Biology</option>
                    <option value="2" style="background: #0D1B3E; color: #FFFFFF;">Business Administration</option>
                    <option value="3" style="background: #0D1B3E; color: #FFFFFF;">Chemistry</option>
                    <option value="4" style="background: #0D1B3E; color: #FFFFFF;">Civil Engineering</option>
                    <option value="5" style="background: #0D1B3E; color: #FFFFFF;">Computer Science</option>
                    <option value="6" style="background: #0D1B3E; color: #FFFFFF;">Economics</option>
                    <option value="7" style="background: #0D1B3E; color: #FFFFFF;">Electrical Engineering</option>
                    <option value="8" style="background: #0D1B3E; color: #FFFFFF;">English Literature</option>
                    <option value="9" style="background: #0D1B3E; color: #FFFFFF;">Mathematics</option>
                    <option value="10" style="background: #0D1B3E; color: #FFFFFF;">Mechanical Engineering</option>
                    <option value="11" style="background: #0D1B3E; color: #FFFFFF;">Physics</option>
                    <option value="12" style="background: #0D1B3E; color: #FFFFFF;">Psychology</option>
                </select>
            </div>

            <div style="display: flex; gap: 12px; border-top: 1px solid rgba(255,255,255,0.05); padding-top: 20px; justify-content: flex-end;">
                <a href="{{ route('students.index') }}" style="color: #CBD5E1; background: transparent; border: 1px solid rgba(255,255,255,0.15); padding: 10px 20px; text-decoration: none; border-radius: 6px; font-size: 13px; font-weight: 600; font-family: 'Montserrat', sans-serif; transition: 0.2s;">CANCEL</a>
                <button type="submit" style="background: linear-gradient(135deg, #C9A84C 0%, #A8893A 100%); color: #0D1B3E; border: none; padding: 10px 24px; border-radius: 6px; font-family: 'Montserrat', sans-serif; font-weight: 700; font-size: 13px; cursor: pointer; box-shadow: 0 4px 12px rgba(201,168,76,0.15);">SAVE RECORD</button>
            </div>
        </form>
    </div>
</div>
@endsection
--}}
