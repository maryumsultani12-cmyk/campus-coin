<x-action-section class="browser-sessions-section">

    <x-slot name="title">
        <div class="browser-title">
            <div class="browser-title-icon">
                <i class="bi bi-laptop"></i>
            </div>

            <div>
                <h2>Browser Sessions</h2>
                <p>Manage your active devices</p>
            </div>
        </div>
    </x-slot>

    <x-slot name="description">
        <div class="browser-description">
            {{ __('Manage and log out your active sessions on other browsers and devices.') }}
        </div>
    </x-slot>

    <x-slot name="content">

        <div class="browser-info">
            <i class="bi bi-info-circle"></i>

            <p>
                {{ __('If necessary, you may log out of all of your other browser sessions across all of your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password.') }}
            </p>
        </div>


        @if (count($this->sessions) > 0)

            <div class="browser-session-list">

                @foreach ($this->sessions as $session)

                    <div class="browser-session-card">

                        <div class="device-icon">

                            @if ($session->agent->isDesktop())

                                <i class="bi bi-laptop"></i>

                            @else

                                <i class="bi bi-phone"></i>

                            @endif

                        </div>


                        <div class="session-details">

                            <div class="session-device">

                                {{ $session->agent->platform()
                                    ? $session->agent->platform()
                                    : __('Unknown') }}

                                <span>•</span>

                                {{ $session->agent->browser()
                                    ? $session->agent->browser()
                                    : __('Unknown') }}

                            </div>


                            <div class="session-meta">

                                <i class="bi bi-globe2"></i>

                                {{ $session->ip_address }}

                                @if ($session->is_current_device)

                                    <span class="current-device">
                                        <i class="bi bi-check-circle-fill"></i>
                                        {{ __('This device') }}
                                    </span>

                                @else

                                    <span class="last-active">
                                        <i class="bi bi-clock"></i>
                                        {{ __('Last active') }}
                                        {{ $session->last_active }}
                                    </span>

                                @endif

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @endif


        <div class="browser-actions">

            <x-button
                class="logout-sessions-btn"
                wire:click="confirmLogout"
                wire:loading.attr="disabled">

                <i class="bi bi-box-arrow-right"></i>

                {{ __('Log Out Other Browser Sessions') }}

            </x-button>


            <x-action-message
                class="session-action-message"
                on="loggedOut">

                <i class="bi bi-check-circle-fill"></i>

                {{ __('Done.') }}

            </x-action-message>

        </div>


        <!-- Log Out Other Devices Confirmation Modal -->

        <x-dialog-modal wire:model.live="confirmingLogout">

            <x-slot name="title">

                <div class="logout-modal-title">

                    <div class="logout-modal-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>

                    <div>
                        <h3>{{ __('Log Out Other Browser Sessions') }}</h3>
                        <span>Security confirmation</span>
                    </div>

                </div>

            </x-slot>


            <x-slot name="content">

                <p class="logout-modal-text">
                    {{ __('Please enter your password to confirm you would like to log out of your other browser sessions across all of your devices.') }}
                </p>


                <div
                    class="logout-password-wrapper"
                    x-data="{}"
                    x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.password.focus(), 250)"
                >

                    <label>Password</label>

                    <div class="password-field">

                        <i class="bi bi-lock"></i>

                        <x-input
                            type="password"
                            class="logout-password-input"
                            autocomplete="current-password"
                            placeholder="{{ __('Password') }}"
                            x-ref="password"
                            wire:model="password"
                            wire:keydown.enter="logoutOtherBrowserSessions"
                        />

                    </div>

                    <x-input-error for="password" class="logout-password-error" />

                </div>

            </x-slot>


            <x-slot name="footer">

                <x-secondary-button
                    class="logout-cancel-btn"
                    wire:click="$toggle('confirmingLogout')"
                    wire:loading.attr="disabled">

                    {{ __('Cancel') }}

                </x-secondary-button>


                <x-button
                    class="logout-confirm-btn"
                    wire:click="logoutOtherBrowserSessions"
                    wire:loading.attr="disabled">

                    <i class="bi bi-box-arrow-right"></i>

                    {{ __('Log Out Other Browser Sessions') }}

                </x-button>

            </x-slot>

        </x-dialog-modal>

    </x-slot>

</x-action-section>


