<x-guest-layout>
    <style>
        /* Tata letak utama */
        .reset-password-container {
            display: flex;
            height: 100vh;
            font-family: 'Arial', sans-serif;
            overflow: hidden;
        }

        /* Bagian logo di kiri */
        .left-section {
            flex: 1;
            background-color: #004d40;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: clamp(1rem, 5vw, 2rem);
            text-align: center;
        }

        .left-section .logo {
            width: clamp(150px, 20vw, 500px);
            height: auto;
            margin-bottom: 2rem;
            margin: 0 auto;
            display: block;
        }

        .left-section .title {
            font-size: clamp(1.5rem, 3vw, 2.5rem);
            font-weight: bold;
            margin-bottom: clamp(0.5rem, 2vw, 1rem);
        }

        /* Bagian form di kanan */
        .right-section {
            flex: 1;
            background-color: #f9fafb;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: clamp(1rem, 5vw, 2rem);
        }

        .form-container {
            width: 100%;
            max-width: none;
            padding: 0;
            background: none;
            border-radius: 0;
            box-shadow: none;
            box-sizing: border-box;
        }

        .form-title {
            font-size: clamp(1.25rem, 2vw, 1.5rem);
            font-weight: bold;
            margin-bottom: 1rem;
            text-align: center;
        }

        .password-toggle {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
        }

        @media (orientation: portrait) {
            .left-section {
                display: none;
            }

            .right-section {
                background-color: #004d40;
                padding: clamp(1rem, 2vw, 2rem);
                width: 100%;
                display: flex;
                justify-content: center;
            }

            .form-container {
                width: 100%;
                max-width: clamp(400px, 60vw, 700px);
                background: white;
                padding: clamp(1.5rem, 5vw, 2.5rem);
                border-radius: clamp(0.3rem, 2vw, 0.5rem);
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .form-title {
                font-size: clamp(1rem, 3vw, 1.25rem);
            }

            .password-toggle {
                right: clamp(3px, 2vw, 5px);
            }
        }

        /* Responsif untuk layar lebih kecil */
        @media (max-width: 480px) {
            .left-section {
                padding: 0.5rem;
            }

            .left-section .logo {
                width: clamp(100px, 25vw, 200px);
            }

            .left-section .title {
                font-size: clamp(1rem, 3vw, 1.5rem);
            }

            .form-container {
                padding: 1rem;
            }
        }

        /* Responsif untuk layar dengan orientasi landscape */
        @media (max-width: 768px) and (orientation: landscape) {
            .reset-password-container {
                display: flex;
                flex-direction: row;
                height: 100vh;
                width: 100vw;
                overflow: hidden;
            }

            .left-section {
                flex: 1;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: clamp(0.5rem, 5vw, 1rem);
            }

            .right-section {
                flex: 1;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: clamp(0.5rem, 5vw, 1rem);
            }

            .form-container {
                width: 90%;
                width: clamp(200px, 80vw, 400px);
            }

            .form-title {
                font-size: clamp(1rem, 2vw, 1.25rem);
            }
        }
    </style>
    <div class="reset-password-container">
        <!-- Bagian kiri untuk logo -->
        <div class="left-section">
            <div class="content">
                <img src="{{ asset('logo/Logo PNJ.png') }}" alt="Logo Politeknik Negeri Jakarta" class="logo">
                <h1 class="title">Politeknik Negeri Jakarta</h1>
            </div>
        </div>

        <!-- Sisi Kanan -->
        <div class="right-section">
            <div class="form-container">
                <h2 class="form-title">Reset Password</h2>

                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div>
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <div>
                        <x-label for="password" value="{{ __('Password') }}" />
                        <div class="relative">
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" :value="old('password')" required autocomplete="new-password" />
                            <button type="button" id="toggle-password" class="password-toggle">
                                <svg id="password-visibility-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path id="eye-open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.94 10.94 0 0112 19c-4.418 0-8-3.582-8-8s3.582-8 8-8c1.128 0 2.207.173 3.225.487M15 12a3 3 0 00-3-3m0 6a3 3 0 003-3" />
                                    <path id="eye-closed" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.25C7.75 4.25 4 8 4 12s3.75 7.75 8 7.75 8-3.75 8-7.75S16.25 4.25 12 4.25zM12 6.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11z" class="hidden" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div>
                        <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <div class="relative">
                            <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" :value="old('password_confirmation')" required autocomplete="new-password" />
                            <button type="button" id="toggle-confirm-password" class="password-toggle">
                                <svg id="confirm-password-visibility-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path id="confirm-eye-open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.94 10.94 0 0112 19c-4.418 0-8-3.582-8-8s3.582-8 8-8c1.128 0 2.207.173 3.225.487M15 12a3 3 0 00-3-3m0 6a3 3 0 003-3" />
                                    <path id="confirm-eye-closed" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.25C7.75 4.25 4 8 4 12s3.75 7.75 8 7.75 8-3.75 8-7.75S16.25 4.25 12 4.25zM12 6.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11z" class="hidden" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button>
                            {{ __('Reset Password') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('password_confirmation');
        const strengthDisplay = document.getElementById('password-strength');
        const togglePasswordButton = document.getElementById('toggle-password');
        const toggleConfirmPasswordButton = document.getElementById('toggle-confirm-password');
        const eyeOpen = document.getElementById('eye-open');
        const eyeClosed = document.getElementById('eye-closed');
        const confirmEyeOpen = document.getElementById('confirm-eye-open');
        const confirmEyeClosed = document.getElementById('confirm-eye-closed');

        let isPasswordVisible = false;
        let isConfirmPasswordVisible = false;

        passwordInput.addEventListener('input', function() {
            const strength = getPasswordStrength(passwordInput.value);
            strengthDisplay.textContent = `Password strength: ${strength}`;
        });

        togglePasswordButton.addEventListener('click', function() {
            isPasswordVisible = !isPasswordVisible;
            passwordInput.type = isPasswordVisible ? 'text' : 'password';
            eyeOpen.classList.toggle('hidden', isPasswordVisible);
            eyeClosed.classList.toggle('hidden', !isPasswordVisible);
        });

        toggleConfirmPasswordButton.addEventListener('click', function() {
            isConfirmPasswordVisible = !isConfirmPasswordVisible;
            confirmPasswordInput.type = isConfirmPasswordVisible ? 'text' : 'password';
            confirmEyeOpen.classList.toggle('hidden', isConfirmPasswordVisible);
            confirmEyeClosed.classList.toggle('hidden', !isConfirmPasswordVisible);
        });

        function getPasswordStrength(password) {
            let strength = 'Weak';
            if (password.length >= 8 && /[A-Z]/.test(password) && /[a-z]/.test(password) && /[0-9]/.test(password)) {
                strength = 'Strong';
            } else if (password.length >= 8) {
                strength = 'Medium';
            }
            return strength;
        }
    </script>
</x-guest-layout>
