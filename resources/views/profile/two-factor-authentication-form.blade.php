
<x-action-section class="two-factor-section">
    <x-slot name="title">
        <h2 class="two-factor-title">
            {{ __('Two Factor Authentication') }}
        </h2>
    </x-slot>

    <x-slot name="description">
        <p class="two-factor-description">
            {{ __('Add additional security to your account using two factor authentication.') }}
        </p>
    </x-slot>

    <x-slot name="content">

        <!-- Status -->
        <div class="two-factor-status">

            <div class="two-factor-status-icon">
                @if ($this->enabled)
                    <i class="bi bi-shield-check"></i>
                @else
                    <i class="bi bi-shield-exclamation"></i>
                @endif
            </div>

            <div>

                <h3 class="two-factor-status-title">

                    @if ($this->enabled)

                        @if ($showingConfirmation)
                            {{ __('Finish enabling two factor authentication.') }}
                        @else
                            {{ __('You have enabled two factor authentication.') }}
                        @endif

                    @else

                        {{ __('You have not enabled two factor authentication.') }}

                    @endif

                </h3>

                <p class="two-factor-status-text">
                    {{ __('When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone\'s Google Authenticator application.') }}
                </p>

            </div>

        </div>


        @if ($this->enabled)

            <!-- QR Code Section -->
            @if ($showingQrCode)

                <div class="two-factor-setup-box">

                    <div class="two-factor-setup-heading">
                        <i class="bi bi-qr-code-scan"></i>

                        <h4>
                            {{ __('Authenticator Setup') }}
                        </h4>
                    </div>

                    <p class="two-factor-setup-text">

                        @if ($showingConfirmation)

                            {{ __('To finish enabling two factor authentication, scan the following QR code using your phone\'s authenticator application or enter the setup key and provide the generated OTP code.') }}

                        @else

                            {{ __('Two factor authentication is now enabled. Scan the following QR code using your phone\'s authenticator application or enter the setup key.') }}

                        @endif

                    </p>


                    <!-- QR Code -->
                    <div class="two-factor-qr">

                        {!! $this->user->twoFactorQrCodeSvg() !!}

                    </div>


                    <!-- Setup Key -->
                    <div class="two-factor-key-box">

                        <span class="two-factor-key-label">
                            {{ __('Setup Key') }}
                        </span>

                        <code>
                            {{ decrypt($this->user->two_factor_secret) }}
                        </code>

                    </div>


                    <!-- Confirmation Code -->
                    @if ($showingConfirmation)

                        <div class="two-factor-code-field">

                            <x-label
                                for="code"
                                value="{{ __('Authentication Code') }}"
                                class="two-factor-field-label"
                            />

                            <x-input
                                id="code"
                                type="text"
                                name="code"
                                class="two-factor-code-input"
                                inputmode="numeric"
                                autofocus
                                autocomplete="one-time-code"
                                wire:model="code"
                                wire:keydown.enter="confirmTwoFactorAuthentication"
                                placeholder="Enter 6-digit code"
                            />

                            <x-input-error
                                for="code"
                                class="two-factor-error"
                            />

                        </div>

                    @endif

                </div>

            @endif


            <!-- Recovery Codes -->
            @if ($showingRecoveryCodes)

                <div class="recovery-section">

                    <div class="recovery-heading">
                        <i class="bi bi-key"></i>

                        <h4>
                            {{ __('Recovery Codes') }}
                        </h4>
                    </div>

                    <p class="recovery-description">
                        {{ __('Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.') }}
                    </p>


                    <div class="recovery-codes">

                        @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)

                            <div class="recovery-code">
                                {{ $code }}
                            </div>

                        @endforeach

                    </div>

                </div>

            @endif

        @endif


        <!-- Buttons -->
        <div class="two-factor-actions">

            @if (! $this->enabled)

                <x-confirms-password wire:then="enableTwoFactorAuthentication">

                    <x-button
                        type="button"
                        class="two-factor-primary-btn"
                        wire:loading.attr="disabled"
                    >
                        <i class="bi bi-shield-plus"></i>
                        {{ __('Enable Two Factor Authentication') }}
                    </x-button>

                </x-confirms-password>

            @else

                @if ($showingRecoveryCodes)

                    <x-confirms-password wire:then="regenerateRecoveryCodes">

                        <x-secondary-button class="two-factor-secondary-btn me-3">
                            <i class="bi bi-arrow-clockwise"></i>
                            {{ __('Regenerate Recovery Codes') }}
                        </x-secondary-button>

                    </x-confirms-password>

                @elseif ($showingConfirmation)

                    <x-confirms-password wire:then="confirmTwoFactorAuthentication">

                        <x-button
                            type="button"
                            class="two-factor-primary-btn me-3"
                            wire:loading.attr="disabled"
                        >
                            <i class="bi bi-check2-circle"></i>
                            {{ __('Confirm') }}
                        </x-button>

                    </x-confirms-password>

                @else

                    <x-confirms-password wire:then="showRecoveryCodes">

                        <x-secondary-button class="two-factor-secondary-btn me-3">
                            <i class="bi bi-key"></i>
                            {{ __('Show Recovery Codes') }}
                        </x-secondary-button>

                    </x-confirms-password>

                @endif


                @if ($showingConfirmation)

                    <x-confirms-password wire:then="disableTwoFactorAuthentication">

                        <x-secondary-button
                            class="two-factor-cancel-btn"
                            wire:loading.attr="disabled"
                        >
                            {{ __('Cancel') }}
                        </x-secondary-button>

                    </x-confirms-password>

                @else

                    <x-confirms-password wire:then="disableTwoFactorAuthentication">

                        <x-danger-button
                            class="two-factor-danger-btn"
                            wire:loading.attr="disabled"
                        >
                            <i class="bi bi-shield-x"></i>
                            {{ __('Disable') }}
                        </x-danger-button>

                    </x-confirms-password>

                @endif

            @endif

        </div>

    </x-slot>

</x-action-section>
