<x-guest-layout>

    <div class="reset-page">

        <!-- ================= LEFT SIDE ================= -->

        <div class="reset-left">

            <div class="reset-brand">

                <div class="reset-brand-icon">
                    <i class="fa fa-graduation-cap"></i>
                </div>

                <span>Campus Coin</span>

            </div>


            <div class="reset-left-content">

                <div class="reset-lock-icon">
                    <i class="fa fa-key"></i>
                </div>

                <h1>
                    Create a New
                    <span>Password.</span>
                </h1>

                <p>
                    Choose a strong password to keep your
                    Campus Coin account safe and secure.
                </p>

            </div>

        </div>


        <!-- ================= RIGHT SIDE ================= -->

        <div class="reset-right">

            <div class="reset-card">

                <div class="reset-icon">
                    <i class="fa fa-key"></i>
                </div>

                <h2>Reset Your Password</h2>

                <p class="reset-subtitle">
                    Create a new password for your Campus Coin
                    account.
                </p>


                <!-- ERRORS -->

                <x-validation-errors class="reset-errors mb-4" />


                <form method="POST" action="{{ route('password.update') }}">

                    @csrf

                    <input
                        type="hidden"
                        name="token"
                        value="{{ $request->route('token') }}"
                    >


                    <!-- EMAIL -->

                    <div class="reset-group">

                        <label for="email">
                            Email Address
                        </label>

                        <div class="reset-input">

                            <i class="fa fa-envelope"></i>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email', $request->email) }}"
                                required
                                autofocus
                                autocomplete="username"
                                placeholder="Enter your email address"
                            >

                        </div>

                    </div>


                    <!-- PASSWORD -->

                    <div class="reset-group">

                        <label for="password">
                            New Password
                        </label>

                        <div class="reset-input">

                            <i class="fa fa-lock"></i>

                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="new-password"
                                placeholder="Create a new password"
                            >

                            <button
                                type="button"
                                class="reset-eye"
                                onclick="toggleResetPassword('password', 'password-eye')"
                            >
                                <i class="fa fa-eye" id="password-eye"></i>
                            </button>

                        </div>

                    </div>


                    <!-- CONFIRM PASSWORD -->

                    <div class="reset-group">

                        <label for="password_confirmation">
                            Confirm Password
                        </label>

                        <div class="reset-input">

                            <i class="fa fa-lock"></i>

                            <input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                                placeholder="Confirm your new password"
                            >

                            <button
                                type="button"
                                class="reset-eye"
                                onclick="toggleResetPassword('password_confirmation', 'confirm-password-eye')"
                            >
                                <i
                                    class="fa fa-eye"
                                    id="confirm-password-eye"
                                ></i>
                            </button>

                        </div>

                    </div>


                    <!-- BUTTON -->

                    <button
                        type="submit"
                        class="reset-button"
                    >

                        <span>
                            <i class="fa fa-check-circle"></i>
                            Reset Password
                        </span>

                        <i class="fa fa-arrow-right"></i>

                    </button>


                    <!-- BACK TO LOGIN -->

                    <a
                        href="{{ route('login') }}"
                        class="reset-back"
                    >

                        <i class="fa fa-arrow-left"></i>

                        Back to Login

                    </a>

                </form>

            </div>

        </div>

    </div>


    <script>

        function toggleResetPassword(inputId, iconId) {

            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);

            if (input.type === "password") {

                input.type = "text";

                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");

            } else {

                input.type = "password";

                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");

            }

        }

    </script>

</x-guest-layout>
