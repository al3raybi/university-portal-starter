<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register — University Portal</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>

{{-- Background --}}
<div class="auth-bg">
    <div class="auth-bg-shape s1"></div>
    <div class="auth-bg-shape s2"></div>
</div>

{{-- Card --}}
<div class="auth-wrapper">
    <div class="auth-card">

        {{-- Logo --}}
        <div class="auth-logo">
            <div class="auth-logo-icon">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                </svg>
            </div>
            <h1>University <span>Portal</span></h1>
            <p>Academic Management System</p>
        </div>

        <div class="auth-divider"></div>

        <h2 class="auth-title">Create Account</h2>

        {{-- Server error alert --}}
        @if ($errors->any())
            <div class="alert alert-error">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/>
                    <line x1="12" y1="8" x2="12" y2="12"/>
                    <line x1="12" y1="16" x2="12.01" y2="16"/>
                </svg>
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="auth-form" id="register-form" novalidate>
            @csrf

            {{-- Hidden combined name (Controller expects "name") --}}
            <input type="hidden" name="name" id="name" value="{{ old('name') }}">

            {{-- Name Row --}}
            <div class="form-row">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <div class="input-wrapper">
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                        <input
                            type="text"
                            id="first_name"
                            name="first_name"
                            placeholder="John"
                            value="{{ old('first_name') }}"
                            required
                            autocomplete="given-name"
                        >
                    </div>
                    <span class="field-error">First name is required.</span>
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <div class="input-wrapper">
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                        <input
                            type="text"
                            id="last_name"
                            name="last_name"
                            placeholder="Doe"
                            value="{{ old('last_name') }}"
                            required
                            autocomplete="family-name"
                        >
                    </div>
                    <span class="field-error">Last name is required.</span>
                </div>
            </div>

            {{-- Email --}}
            <div class="form-group">
                <label for="email">Email Address</label>
                <div class="input-wrapper">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                        <polyline points="22,6 12,13 2,6"/>
                    </svg>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="you@university.edu"
                        value="{{ old('email') }}"
                        required
                        autocomplete="email"
                    >
                </div>
                <span class="field-error">Enter a valid email address.</span>
            </div>

            {{-- Password --}}
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-wrapper">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                    </svg>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Min. 8 characters"
                        required
                        autocomplete="new-password"
                    >
                    <button type="button" class="toggle-password" aria-label="Toggle password">
                        <svg class="icon-eye" viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>
                        <svg class="icon-eye-off" viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" style="display:none">
                            <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/>
                            <path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/>
                            <line x1="1" y1="1" x2="23" y2="23"/>
                        </svg>
                    </button>
                </div>
                {{-- Strength meter --}}
                <div class="password-strength">
                    <div class="strength-bars">
                        <div class="strength-bar"></div>
                        <div class="strength-bar"></div>
                        <div class="strength-bar"></div>
                        <div class="strength-bar"></div>
                    </div>
                    <span class="strength-label"></span>
                </div>
                <span class="field-error">Password must be at least 8 characters.</span>
            </div>

            {{-- Confirm Password --}}
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <div class="input-wrapper">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                    </svg>
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Repeat password"
                        required
                        autocomplete="new-password"
                    >
                    <button type="button" class="toggle-password" aria-label="Toggle password">
                        <svg class="icon-eye" viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>
                        <svg class="icon-eye-off" viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" style="display:none">
                            <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/>
                            <path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/>
                            <line x1="1" y1="1" x2="23" y2="23"/>
                        </svg>
                    </button>
                </div>
                <span class="field-error">Passwords do not match.</span>
            </div>

            {{-- Terms --}}
            <div class="checkbox-group">
                <input type="checkbox" id="terms" name="terms" required>
                <label for="terms">
                    I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                </label>
            </div>

            {{-- Submit --}}
            <button type="submit" class="btn-auth">
                <span class="btn-text">Create Account</span>
                <div class="spinner"></div>
            </button>
        </form>

        <p class="auth-switch">
            Already have an account? <a href="{{ route('login') }}">Sign in</a>
        </p>

    </div>
</div>

<script src="{{ asset('js/auth.js') }}"></script>

{{-- Combine first + last name into the hidden "name" field before submit --}}
<script>
    document.getElementById('register-form').addEventListener('submit', function () {
        var first = document.getElementById('first_name').value.trim();
        var last  = document.getElementById('last_name').value.trim();
        document.getElementById('name').value = (first + ' ' + last).trim();
    });
</script>
</body>
</html>