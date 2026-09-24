<x-form-section submit="updatePassword" class="password-section">

    <x-slot name="title">
        <h2 class="password-section-title">
            {{ __('Update Password') }}
        </h2>
    </x-slot>

    <x-slot name="description">
        <p class="password-section-description">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </x-slot>


    <x-slot name="form">

        <!-- Current Password -->
        <div class="password-field">

            <x-label
                for="current_password"
                value="{{ __('Current Password') }}"
                class="password-field-label"
            />

            <div class="password-input-wrapper">

                <x-input
                    id="current_password"
                    type="password"
                    class="password-input"
                    wire:model="state.current_password"
                    autocomplete="current-password"
                    placeholder="Enter current password"
                />

                <button
                    type="button"
                    class="password-toggle"
                    onclick="togglePassword('current_password', this)"
                >
                    <i class="bi bi-eye"></i>
                </button>

            </div>

            <x-input-error
                for="current_password"
                class="password-input-error"
            />

        </div>


        <!-- New Password -->
        <div class="password-field">

            <x-label
                for="password"
                value="{{ __('New Password') }}"
                class="password-field-label"
            />

            <div class="password-input-wrapper">

                <x-input
                    id="password"
                    type="password"
                    class="password-input"
                    wire:model="state.password"
                    autocomplete="new-password"
                    placeholder="Enter new password"
                />

                <button
                    type="button"
                    class="password-toggle"
                    onclick="togglePassword('password', this)"
                >
                    <i class="bi bi-eye"></i>
                </button>

            </div>

            <x-input-error
                for="password"
                class="password-input-error"
            />

        </div>


        <!-- Confirm Password -->
        <div class="password-field">

            <x-label
                for="password_confirmation"
                value="{{ __('Confirm Password') }}"
                class="password-field-label"
            />

            <div class="password-input-wrapper">

                <x-input
                    id="password_confirmation"
                    type="password"
                    class="password-input"
                    wire:model="state.password_confirmation"
                    autocomplete="new-password"
                    placeholder="Confirm new password"
                />

                <button
                    type="button"
                    class="password-toggle"
                    onclick="togglePassword('password_confirmation', this)"
                >
                    <i class="bi bi-eye"></i>
                </button>

            </div>

            <x-input-error
                for="password_confirmation"
                class="password-input-error"
            />

        </div>

    </x-slot>


    <x-slot name="actions">

        <x-action-message
            class="password-saved-message"
            on="saved"
        >
            <i class="bi bi-check-circle"></i>
            {{ __('Saved.') }}
        </x-action-message>

        <x-button class="password-save-btn">
            <i class="bi bi-shield-check"></i>
            {{ __('Save Changes') }}
        </x-button>

    </x-slot>

</x-form-section>


<script>
    function togglePassword(id, button) {

        const input = document.getElementById(id);
        const icon = button.querySelector('i');

        if (input.type === 'password') {

            input.type = 'text';

            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');

        } else {

            input.type = 'password';

            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');

        }
    }
</script>
