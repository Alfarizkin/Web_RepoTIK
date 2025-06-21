<x-guest-layout>
    <div class="login-container">
        <!-- Sisi Kiri -->
        <div class="left-section">
            <div class="content">
                <img src="{{ asset('logo/Logo PNJ.png') }}" alt="Logo PNJ" class="logo" />
                <h1 class="title">Politeknik Negeri Jakarta</h1>
                <p class="description">
                    Welcome to the Information System of Politeknik Negeri Jakarta Academy.
                </p>
            </div>
        </div>

        <!-- Sisi Kanan -->
        <div class="right-section">
            <div class="form-container">
                <h2 class="form-title">Login</h2>
                <x-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Password') }}" />
                        <div class="password-field">
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                            <button type="button" id="toggle-password" class="password-toggle">
                                <svg id="password-visibility-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path id="eye-open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.94 10.94 0 0112 19c-4.418 0-8-3.582-8-8s3.582-8 8-8c1.128 0 2.207.173 3.225.487M15 12a3 3 0 00-3-3m0 6a3 3 0 003-3" />
                                    <path id="eye-closed" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.25C7.75 4.25 4 8 4 12s3.75 7.75 8 7.75 8-3.75 8-7.75S16.25 4.25 12 4.25zM12 6.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11z" class="hidden" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                                {{ __('Create an account') }}
                            </a>

                        <x-button class="ml-4">
                            {{ __('Log in') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        /* Tata letak utama */
        .login-container {
            display: flex;
            height: 100vh;
            font-family: 'Arial', sans-serif;
            overflow: hidden;
        }

        /* Sisi Kiri */
        .left-section {
            flex: 1;
            background-color: #004d40;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
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
            margin-bottom: 1rem;
        }

        .left-section .description {
            font-size: clamp(1rem, 2vw, 1.5rem);
            line-height: 1.6;
        }

        /* Sisi Kanan */
        .right-section {
            flex: 1;
            background-color: #f9fafb;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
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

        .password-field {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
        }

        /* Responsif untuk layar kecil (Portrait) */
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
            .login-container {
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

    <script>
        const passwordInput = document.getElementById('password');
        const togglePasswordButton = document.getElementById('toggle-password');
        const eyeOpen = document.getElementById('eye-open');
        const eyeClosed = document.getElementById('eye-closed');

        let isPasswordVisible = false;
        let isConfirmPasswordVisible = false;

        togglePasswordButton.addEventListener('click', function() {
            isPasswordVisible = !isPasswordVisible;
            passwordInput.type = isPasswordVisible ? 'text' : 'password';
            eyeOpen.classList.toggle('hidden', isPasswordVisible);
            eyeClosed.classList.toggle('hidden', !isPasswordVisible);
        });
    </script>
</x-guest-layout>