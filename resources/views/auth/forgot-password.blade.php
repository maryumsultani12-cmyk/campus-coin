<x-guest-layout>
    <link rel="stylesheet" href="{{ asset('custom-assets/css/style.css') }}">

    <div class="forgot-page">

        <!-- LEFT SIDE -->
        <div class="forgot-left">

            <div class="forgot-brand">
              

                <span>Campus Coin</span>
            </div>

            <div class="forgot-content">

                <div class="forgot-icon">
                    <i class="fa fa-lock"></i>
                </div>

                <h1>Forgot Your<br>
                    <span>Password?</span>
                </h1>

                <p>
                    Don't worry, it happens to everyone.
                    Enter your email address and we'll send
                    you a secure link to reset your password.
                </p>

            </div>

        </div>


        <!-- RIGHT SIDE -->
        <div class="forgot-right">

            <div class="forgot-card">

                <div class="mobile-icon">
                    <i class="fa fa-lock"></i>
                </div>

                <h2>Reset Your Password</h2>

                <p class="forgot-subtitle">
                    Enter your email address to receive
                    a password reset link.
                </p>


                @session('status')

                <div class="success-message">
                    <i class="fa fa-check-circle"></i>
                    {{ $value }}
                </div>

                @endsession


                <x-validation-errors class="forgot-errors mb-4" />


                <form method="POST" action="{{ route('password.email') }}">

                    @csrf

                    <!-- EMAIL -->

                    <div class="forgot-group">

                        <label for="email">
                            Email Address
                        </label>

                        <div class="forgot-input">

                            <i class="fa fa-envelope"></i>

                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                                autocomplete="username" placeholder="Enter your email address">

                        </div>

                    </div>


                    <!-- BUTTON -->

                    <button type="submit" class="forgot-button">

                        <span>
                            <i class="fa fa-paper-plane"></i>
                            Send Reset Link
                        </span>

                        <i class="fa fa-arrow-right"></i>

                    </button>


                    <!-- BACK TO LOGIN -->

                    <a href="{{ route('login') }}" class="back-login">

                        <i class="fa fa-arrow-left"></i>

                        Back to Login

                    </a>

                </form>

            </div>

        </div>

    </div>

</x-guest-layout>