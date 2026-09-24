<x-guest-layout>

    <div class="confirm-page">

        <!-- ================= LEFT SIDE ================= -->

        <div class="confirm-left">

            <div class="confirm-brand">

                <div class="confirm-brand-icon">
                    <i class="fa fa-graduation-cap"></i>
                </div>

                <span>Campus Coin</span>

            </div>


            <div class="confirm-left-content">

                <div class="confirm-lock-icon">
                    <i class="fa fa-shield-alt"></i>
                </div>

                <h1>
                    Keep Your Account
                    <span>Secure.</span>
                </h1>

                <p>
                    You're entering a secure area of Campus Coin.
                    Please confirm your password to continue safely.
                </p>

            </div>

        </div>


        <!-- ================= RIGHT SIDE ================= -->

        <div class="confirm-right">

            <div class="confirm-card">

                <div class="confirm-icon">
                    <i class="fa fa-lock"></i>
                </div>

                <h2>Confirm Your Password</h2>

                <p class="confirm-subtitle">
                    This is a secure area. Please enter your
                    password before continuing.
                </p>


                <!-- ERRORS -->

                <x-validation-errors class="confirm-errors mb-4" />


                <!-- FORM -->

                <form method="POST" action="{{ route('password.confirm') }}">

                    @csrf


                    <!-- PASSWORD -->

                    <div class="confirm-group">

                        <label for="password">
                            Password
                        </label>

                        <div class="confirm-input">

                            <i class="fa fa-lock"></i>

                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="current-password"
                                autofocus
                                placeholder="Enter your password"
                            >

                            <button
                                type="button"
                                class="confirm-eye"
                                onclick="toggleConfirmPassword()"
                            >
                                <i class="fa fa-eye" id="confirm-eye-icon"></i>
                            </button>

                        </div>

                    </div>


                    <!-- BUTTON -->

                    <button type="submit" class="confirm-button">

                        <span>
                            <i class="fa fa-shield-alt"></i>
                            Confirm Password
                        </span>

                        <i class="fa fa-arrow-right"></i>

                    </button>


                    <!-- BACK -->

                    <a href="{{ route('login') }}" class="confirm-back">

                        <i class="fa fa-arrow-left"></i>

                        Back to Login

                    </a>

                </form>

            </div>

        </div>

    </div>


    <script>

        function toggleConfirmPassword() {

            const password = document.getElementById('password');
            const icon = document.getElementById('confirm-eye-icon');

            if (password.type === 'password') {

                password.type = 'text';

                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');

            } else {

                password.type = 'password';

                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');

            }

        }

    </script>

</x-guest-layout>
