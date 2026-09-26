<x-guest-layout>
    <link rel="stylesheet" href="{{ asset('custom-assets/css/style.css') }}">

    <div class="campus-login-page">





        <!-- LEFT IMAGE SECTION -->
        <!-- LEFT IMAGE SECTION -->
<div class="login-image">

    <!-- LOGO TOP LEFT -->
    <div class="top-logo">
        <img
            src="{{ asset('custom-assets/images/logo.png') }}"
            alt="Campus Coin Logo"
            
        >
          <div class="logo-text">
        <strong>Campus <span>Coin</span></strong>
    </div>

        
    </div>

    <!-- STUDENT IMAGE + TEXT -->
    <div class="img">

        <div class="image-overlay">

            <h1>
                Secure Access<br>
                to Your Financial<br>
                <span>Future.</span>
            </h1>

            <p>
                Smart Spending. Student Style.
            </p>

        </div>

    </div>

</div>

        <!-- RIGHT LOGIN SECTION -->
        <div class="login-area">

            <div class="login-card">

                <div class="login-heading">
                    <h2>Welcome Back</h2>

                    <p>
                        Login to your Campus Coin account
                    </p>
                </div>


                <x-validation-errors class="mb-4" />

                @session('status')
                <div class="status-message">
                    {{ $value }}
                </div>
                @endsession


                <!-- LOGIN / REGISTER TABS -->
                <div class="login-tabs">

                    <span class="active">
                        Login
                    </span>

                    <a href="{{ route('register') }}">
                        Register
                    </a>

                </div>


                <!-- EMAIL -->
                <form method="POST" action="{{ route('login') }}">

                    @csrf

                    <div class="form-group">

                        <label for="email">
                            Email Address
                        </label>

                        <div class="input-box">

                            <i class="fa fa-envelope"></i>

                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                                autocomplete="username" placeholder="Email Address">

                        </div>

                    </div>


                    <!-- PASSWORD -->
                    <div class="form-group">

                        <label for="password">
                            Password
                        </label>

                        <div class="input-box">

                            <i class="fa fa-lock"></i>

                            <input id="password" type="password" name="password" required
                                autocomplete="current-password" placeholder="Password">

                            <i class="fa fa-eye password-eye" onclick="togglePassword()">
                            </i>

                        </div>

                    </div>


                    <!-- FORGOT PASSWORD -->
                    <div class="forgot-row">

                        <label>
                            <input type="checkbox" name="remember">

                            Remember me
                        </label>

                        @if (Route::has('password.request'))

                        <a href="{{ route('password.request') }}">
                            Forgot Password?
                        </a>

                        @endif

                    </div>


                    <!-- LOGIN BUTTON -->
                    <button type="submit" class="login-button">
                        Login
                    </button>

                </form>


                <!-- OR -->
                <div class="or-divider">

                    <span></span>

                    <b>OR</b>

                    <span></span>

                </div>


                <!-- GOOGLE LOGIN -->
                <a href="/auth/google" class="google-login">

                    <img src="{{ Vite::asset('resources/image/google-icon.png') }}" alt="Google">

                    <span>
                        Continue with Google
                    </span>

                </a>


                <!-- REGISTER -->
                <p class="register-text">

                    Don't have an account?

                    <a href="{{ route('register') }}">
                        Register here
                    </a>

                </p>

            </div>

        </div>

    </div>


    <script>
    function togglePassword() {

        const password =
            document.getElementById('password');

        if (password.type === 'password') {

            password.type = 'text';

        } else {

            password.type = 'password';

        }

    }
    </script>

</x-guest-layout>