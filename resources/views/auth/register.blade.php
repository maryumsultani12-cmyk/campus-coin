<x-guest-layout>
    <link rel="stylesheet" href="{{ asset('custom-assets/css/style.css') }}">

    <div class="campus-page">
        <!-- ================= REGISTER PAGE ================= -->

        <section class="register-section">

            <!-- HEADING -->

            <div class="register-heading">

                <h1>Join Campus Coin</h1>

                <p>
                    Start managing your finances for a brighter future!
                </p>

            </div>


            <!-- REGISTER CONTENT -->

            <div class="register-content">

                <!-- ================= FORM CARD ================= -->

                <div class="register-card">

                    <x-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('register') }}">

                        @csrf


                        <!-- NAME -->

                        <div class="register-group">
                            <!-- LOGIN / REGISTER TABS -->
                            <div class="login-tabs">



                                <a class="nav-link {{ request()->is('login') ? 'active' : '' }}"
                                    href="{{ route('login') }}" aria-current="page">
                                    <span class="nav-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
                                    <span class="nav-text">login</span>
                                </a>
                                <a class="nav-link {{ request()->is('register') ? 'active' : '' }}"
                                    href="{{ route('register') }}" aria-current="page">
                                    <span class="nav-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
                                    <span class="nav-text">register</span>
                                </a>


                            </div>
                            <label for="name">
                                Full Name
                            </label>

                            <div class="register-input">

                                <i class="fa fa-user"></i>

                                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                                    autocomplete="name" placeholder="e.g., Alex Johnson">

                            </div>

                        </div>


                        <!-- EMAIL -->

                        <div class="register-group">

                            <label for="email">
                                Campus Email
                            </label>

                            <div class="register-input">

                                <i class="fa fa-envelope"></i>

                                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                    autocomplete="username" placeholder="e.g., alex.j@university.edu">

                            </div>

                        </div>


                        <!-- PASSWORD -->

                        <div class="register-group">

                            <label for="password">
                                Password
                            </label>

                            <div class="register-input">

                                <i class="fa fa-lock"></i>

                                <input id="password" type="password" name="password" required
                                    autocomplete="new-password" placeholder="Create a secure password">
                                <i class="fa fa-eye password-eye" onclick="togglePassword()">
                                </i>

                            </div>

                        </div>


                        <!-- CONFIRM PASSWORD -->

                        <div class="register-group">

                            <label for="password_confirmation">
                                Confirm Password
                            </label>

                            <div class="register-input">

                                <i class="fa fa-lock"></i>

                                <input id="password_confirmation" type="password" name="password_confirmation" required
                                    autocomplete="new-password" placeholder="Retype your password">
                                <i class="fa fa-eye password-eye" onclick="togglePassword()">
                                </i>

                            </div>

                        </div>


                        <!-- TERMS -->

                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())

                        <div class="terms-box">

                            <input type="checkbox" name="terms" id="terms" required>

                            <label for="terms">

                                I agree to the

                                <a target="_blank" href="{{ route('terms.show') }}">
                                    Terms of Service
                                </a>

                                and

                                <a target="_blank" href="{{ route('policy.show') }}">
                                    Privacy Policy
                                </a>

                            </label>

                        </div>

                        @endif


                        <!-- REGISTER BUTTON -->

                        <button type="submit" class="register-button">

                            <i class="fa fa-check-circle"></i>

                            Create Account

                            <i class="fa fa-arrow-right"></i>

                        </button>


                        <!-- LOGIN -->

                        <p class="already-text">

                            Already have an account?

                            <a href="{{ route('login') }}">
                                Log in
                            </a>

                        </p>

                    </form>

                </div>


                <!-- ================= RIGHT IMAGE ================= -->

                <div class="register-image-area">

                    <div class="speech-bubble">
                        It only takes a minute
                        <br>
                        to get started!
                    </div>

                    <div class="img">
                        
                        <div class="top-logo">
                            <img src="{{ asset('custom-assets/images/logo.png') }}" alt="Campus Coin Logo">
                            <div class="logo-text">
                                <strong>Campus <span>Coin</span></strong>
                            </div>

                        </div>


                    </div>

                </div>

        </section>





    </div>
    <script>
    function togglePassword() {
    const password = document.getElementById('password');
    const passwordConfirmation = document.getElementById('password_confirmation');

    if (password.type === 'password') {
        password.type = 'text';

        if (passwordConfirmation) {
            passwordConfirmation.type = 'text';
        }
    } else {
        password.type = 'password';

        if (passwordConfirmation) {
            passwordConfirmation.type = 'password';
        }
    }
}
    </script>
</x-guest-layout>