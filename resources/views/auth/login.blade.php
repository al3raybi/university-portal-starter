<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — University Portal</title>
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

        <h2 class="auth-title">Welcome Back</h2>

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

       <form method="POST" action="{{ route('login') }}" class="auth-form" novalidate>
            @csrf

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
                        placeholder="••••••••"
                        required
                        autocomplete="current-password"
                    >
                    <button type="button" class="toggle-password" aria-label="Toggle password">
                        {{-- Eye --}}
                        <svg class="icon-eye" viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>
                        {{-- Eye-off --}}
                        <svg class="icon-eye-off" viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" style="display:none">
                            <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/>
                            <path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/>
                            <line x1="1" y1="1" x2="23" y2="23"/>
                        </svg>
                    </button>
                </div>
                <span class="field-error">Password is required.</span>
            </div>

            {{-- Forgot --}}
            <div class="form-options">
                <a href="{{ route('password.request') }}" class="forgot-link">Forgot password?</a>
            </div>

            {{-- Submit --}}
            <button type="submit" class="btn-auth">
                <span class="btn-text">Sign In</span>
                <div class="spinner"></div>
            </button>
        </form>

        <p class="auth-switch">
            Don't have an account? <a href="{{ route('register') }}">Create one</a>
        </p>

    </div>
</div>

<script src="{{ asset('js/auth.js') }}"></script>
</body>
</html>