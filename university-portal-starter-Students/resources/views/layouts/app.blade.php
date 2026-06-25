<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'University Portal')</title>
    <link rel="stylesheet" href="{{ asset('css/app-layout.css') }}">
    @stack('styles')
</head>
<body>

{{-- ══ HEADER ══ --}}
<header class="site-header">
    <div class="header-inner">

        {{-- Brand --}}
        <a href="{{ url('/') }}" class="brand">
            <div class="brand-icon">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                </svg>
            </div>
            <div class="brand-text">
                <h1>University <span>Portal</span></h1>
                <p>Academic Management System</p>
            </div>
        </a>

        {{-- Desktop Nav --}}
        <nav class="site-nav">
            <a href="{{ route('departments.index') }}" class="nav-link">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                    <polyline points="9 22 9 12 15 12 15 22"/>
                </svg>
                Departments
            </a>

            <a href="{{ route('students.index') }}" class="nav-link">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
                Students
            </a>

            <a href="{{ route('courses.index') }}" class="nav-link">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
                    <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                </svg>
                Courses
            </a>
        </nav>

        {{-- Hamburger (mobile) --}}
        <button class="hamburger" id="hamburger" aria-label="Toggle menu">
            <span></span>
            <span></span>
            <span></span>
        </button>

    </div>

    {{-- Mobile Nav --}}
    <nav class="mobile-nav" id="mobile-nav">
        <a href="{{ route('departments.index') }}" class="nav-link">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                <polyline points="9 22 9 12 15 12 15 22"/>
            </svg>
            Departments
        </a>
        <a href="{{ route('students.index') }}" class="nav-link">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                <circle cx="9" cy="7" r="4"/>
            </svg>
            Students
        </a>
        <a href="{{ route('courses.index') }}" class="nav-link">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
            </svg>
            Courses
        </a>
    </nav>
</header>

{{-- ══ MAIN CONTENT ══ --}}
<main class="site-main">
    @yield('content')
</main>

{{-- ══ FOOTER ══ --}}
<footer class="site-footer">
    <div class="footer-inner">
        <p class="footer-copy">
            &copy; {{ date('Y') }} <span>University Portal</span>. All rights reserved.
        </p>
        <span class="footer-badge">Academic Management System</span>
    </div>
</footer>

<script src="{{ asset('js/app-layout.js') }}"></script>
@stack('scripts')
</body>
</html>