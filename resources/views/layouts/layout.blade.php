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

            <a href="{{ route('enrollments.index') }}" class="nav-link">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 11l3 3L22 4"/>
                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>
                </svg>
                Enrollments
            </a>

            <a href="{{ route('professors.index') }}" class="nav-link">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                    <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                </svg>
                Professors
            </a>

            {{-- Logout (POST) --}}
            <form method="POST" action="{{ route('logout') }}" class="nav-logout-form">
                @csrf
                <button type="submit" class="nav-link nav-logout">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                        <polyline points="16 17 21 12 16 7"/>
                        <line x1="21" y1="12" x2="9" y2="12"/>
                    </svg>
                    Logout
                </button>
            </form>
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
        <a href="{{ route('enrollments.index') }}" class="nav-link">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 11l3 3L22 4"/>
                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>
            </svg>
            Enrollments
        </a>
        <a href="{{ route('professors.index') }}" class="nav-link">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                <path d="M6 12v5c3 3 9 3 12 0v-5"/>
            </svg>
            Professors
        </a>

        {{-- Logout (POST) --}}
        <form method="POST" action="{{ route('logout') }}" class="nav-logout-form">
            @csrf
            <button type="submit" class="nav-link nav-logout">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                    <polyline points="16 17 21 12 16 7"/>
                    <line x1="21" y1="12" x2="9" y2="12"/>
                </svg>
                Logout
            </button>
        </form>
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
<script src="{{ asset('js/table-search.js') }}"></script>
@stack('scripts')
</body>
</html>