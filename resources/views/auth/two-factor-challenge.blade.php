<x-guest-layout>

    <div class="two-factor-page">

        <div class="two-factor-card">

            <!-- Logo -->
            <div class="two-factor-logo">
                <x-authentication-card-logo />
            </div>

            <div x-data="{ recovery: false }">

                <!-- Heading -->
                <div class="two-factor-heading">
                    <h2>Two-Factor Authentication</h2>
                    <p x-show="! recovery">
                        Please enter the authentication code from your authenticator app.
                    </p>

                    <p x-cloak x-show="recovery">
                        Please enter one of your emergency recovery codes.
                    </p>
                </div>

                <!-- Validation -->
                <x-validation-errors class="two-factor-errors" />

                <!-- Form -->
                <form method="POST" action="{{ route('two-factor.login') }}">
                    @csrf

                    <!-- Authentication Code -->
                    <div class="two-factor-field" x-show="! recovery">
                        <x-label for="code" value="{{ __('Authentication Code') }}" />

                        <x-input
                            id="code"
                            class="two-factor-input"
                            type="text"
                            inputmode="numeric"
                            name="code"
                            autofocus
                            x-ref="code"
                            autocomplete="one-time-code"
                            placeholder="Enter 6-digit code"
                        />
                    </div>

                    <!-- Recovery Code -->
                    <div class="two-factor-field" x-cloak x-show="recovery">
                        <x-label for="recovery_code" value="{{ __('Recovery Code') }}" />

                        <x-input
                            id="recovery_code"
                            class="two-factor-input"
                            type="text"
                            name="recovery_code"
                            x-ref="recovery_code"
                            autocomplete="one-time-code"
                            placeholder="Enter recovery code"
                        />
                    </div>

                    <!-- Actions -->
                    <div class="two-factor-actions">

                        <button
                            type="button"
                            class="switch-code-btn"
                            x-show="! recovery"
                            x-on:click="
                                recovery = true;
                                $nextTick(() => { $refs.recovery_code.focus() })
                            "
                        >
                            Use a recovery code
                        </button>

                        <button
                            type="button"
                            class="switch-code-btn"
                            x-cloak
                            x-show="recovery"
                            x-on:click="
                                recovery = false;
                                $nextTick(() => { $refs.code.focus() })
                            "
                        >
                            Use authentication code
                        </button>

                        <button type="submit" class="two-factor-login-btn">
                            Log in
                        </button>

                    </div>

                </form>

            </div>
        </div>

    </div>

</x-guest-layout>
