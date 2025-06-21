<x-guest-layout>
    <style>
        /* Tata letak utama */
        .forgot-password-container {
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

        .auth-card {
            width: 100%;
            max-width: none;
            padding: 0;
            background: none;
            border-radius: 0;
            box-shadow: none;
            box-sizing: border-box;
        }

        .auth-card h2 {
            font-size: clamp(1.25rem, 2vw, 1.5rem);
            font-weight: bold;
            margin-bottom: 1rem;
            text-align: center;
        }

        .auth-card p {
            ont-size: clamp(0.8rem, 2vw, 1rem);
            text-align: center;
            color: #4a5568;
            margin-bottom: clamp(1rem, 3vw, 1.5rem);
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

            .auth-card {
                width: 100%;
                max-width: clamp(400px, 60vw, 700px);
                background: white;
                padding: clamp(1.5rem, 5vw, 2.5rem);
                border-radius: clamp(0.3rem, 2vw, 0.5rem);
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .auth-card h2 {
                font-size: clamp(1rem, 3vw, 1.25rem);
            }
        }

        /* Responsif untuk layar lebih kecil (misalnya 480px) */
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
            .forgot-password-container {
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

            .auth-card {
                width: 90%;
                width: clamp(200px, 80vw, 400px);
            }

            .auth-card h2 {
                font-size: clamp(1rem, 2vw, 1.25rem);
            }
        }
    </style>

    <div class="forgot-password-container">
        <!-- Bagian kiri untuk logo -->
        <div class="left-section">
            <div class="content">
                <a href="{{ route('login') }}" class="header-link">
                    <img src="{{ asset('logo/Logo PNJ.png') }}" alt="Logo Politeknik Negeri Jakarta" class="logo">
                    <h1 class="title">Politeknik Negeri Jakarta</h1>
                </a>
            </div>
        </div>

        <!-- Bagian kanan untuk form -->
        <div class="right-section">
            <div class="auth-card">
                <h2>Email Reset Password</h2>
                <p>{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</p>

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div>
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button>
                            {{ __('Email Password Reset Link') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>