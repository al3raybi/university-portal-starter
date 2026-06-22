/**
 * auth.js — University Portal
 * Handles: validation, password toggle, strength meter, form submit
 */

document.addEventListener('DOMContentLoaded', () => {

    /* ── Password Toggle ── */
    document.querySelectorAll('.toggle-password').forEach(btn => {
        btn.addEventListener('click', () => {
            const input = btn.closest('.input-wrapper').querySelector('input');
            const isText = input.type === 'text';
            input.type = isText ? 'password' : 'text';

            // swap icon
            btn.querySelector('.icon-eye').style.display     = isText ? 'block' : 'none';
            btn.querySelector('.icon-eye-off').style.display = isText ? 'none'  : 'block';
        });
    });

    /* ── Password Strength ── */
    const strengthInput = document.getElementById('password-strength-input');
    if (strengthInput) {
        strengthInput.addEventListener('input', () => {
            const val   = strengthInput.value;
            const score = getStrengthScore(val);
            updateStrengthUI(score);
        });
    }

    function getStrengthScore(pwd) {
        if (!pwd) return 0;
        let score = 0;
        if (pwd.length >= 8)               score++;
        if (/[A-Z]/.test(pwd))             score++;
        if (/[0-9]/.test(pwd))             score++;
        if (/[^A-Za-z0-9]/.test(pwd))      score++;
        return score; // 0-4
    }

    function updateStrengthUI(score) {
        const bars   = document.querySelectorAll('.strength-bar');
        const label  = document.querySelector('.strength-label');
        if (!bars.length) return;

        const levels = ['', 'weak', 'fair', 'good', 'strong'];
        const labels = ['', 'Weak', 'Fair', 'Good', 'Strong'];

        bars.forEach((bar, i) => {
            bar.className = 'strength-bar';
            if (i < score) bar.classList.add(`active-${levels[score]}`);
        });

        if (label) label.textContent = score ? labels[score] : '';
    }

    /* ── Inline Validation ── */
    function setError(input, msg) {
        const group = input.closest('.form-group');
        if (!group) return;
        group.classList.add('has-error');
        const err = group.querySelector('.field-error');
        if (err) err.textContent = msg;
    }

    function clearError(input) {
        const group = input.closest('.form-group');
        if (!group) return;
        group.classList.remove('has-error');
    }

    function validateEmail(val) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val);
    }

    /* ── Live validation on blur ── */
    document.querySelectorAll('.auth-form input').forEach(input => {
        input.addEventListener('blur', () => validateField(input));
        input.addEventListener('input', () => {
            if (input.closest('.form-group').classList.contains('has-error')) {
                validateField(input);
            }
        });
    });

    function validateField(input) {
        const val  = input.value.trim();
        const name = input.name;

        if (input.required && !val) {
            setError(input, 'This field is required.');
            return false;
        }

        if (name === 'email' && val && !validateEmail(val)) {
            setError(input, 'Enter a valid email address.');
            return false;
        }

        if (name === 'password' && val && val.length < 8) {
            setError(input, 'Password must be at least 8 characters.');
            return false;
        }

        if (name === 'password_confirmation') {
            const pwd = document.querySelector('input[name="password"]');
            if (pwd && val !== pwd.value) {
                setError(input, 'Passwords do not match.');
                return false;
            }
        }

        clearError(input);
        return true;
    }

    /* ── Form Submit ── */
    document.querySelectorAll('.auth-form').forEach(form => {
        form.addEventListener('submit', (e) => {
            let valid = true;

            form.querySelectorAll('input[required]').forEach(input => {
                if (!validateField(input)) valid = false;
            });

            if (!valid) {
                e.preventDefault();
                return;
            }

            // Show loading state
            const btn = form.querySelector('.btn-auth');
            if (btn) btn.classList.add('loading');
        });
    });

});