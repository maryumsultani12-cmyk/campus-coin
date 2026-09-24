<x-form-section submit="updateProfileInformation" class="profile-information-section">

    <x-slot name="title">
        <h2 class="profile-section-title">
            {{ __('Profile Information') }}
        </h2>
    </x-slot>

    <x-slot name="description">
        <p class="profile-section-description">
            {{ __('Update your account\'s profile information and email address.') }}
        </p>
    </x-slot>

    <x-slot name="form">

        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())

            <div
                x-data="{photoName: null, photoPreview: null}"
                class="profile-photo-box"
            >

                <input
                    type="file"
                    id="photo"
                    class="hidden"
                    wire:model.live="photo"
                    x-ref="photo"
                    x-on:change="
                        photoName = $refs.photo.files[0].name;
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            photoPreview = e.target.result;
                        };
                        reader.readAsDataURL($refs.photo.files[0]);
                    "
                />

                <x-label
                    for="photo"
                    value="{{ __('Profile Photo') }}"
                    class="profile-field-label"
                />

                <!-- Current Photo -->
                <div class="profile-photo-wrapper" x-show="! photoPreview">

                    <img
                        src="{{ $this->user->profile_photo_url }}"
                        alt="{{ $this->user->name }}"
                        class="profile-photo"
                    >

                </div>

                <!-- Preview -->
                <div
                    class="profile-photo-wrapper"
                    x-show="photoPreview"
                    style="display: none;"
                >

                    <span
                        class="profile-photo profile-photo-preview"
                        x-bind:style="'background-image: url(\'' + photoPreview + '\');'"
                    ></span>

                </div>

                <div class="profile-photo-buttons">

                    <button
                        type="button"
                        class="profile-outline-btn"
                        x-on:click.prevent="$refs.photo.click()"
                    >
                        <i class="bi bi-camera"></i>
                        {{ __('Select New Photo') }}
                    </button>

                    @if ($this->user->profile_photo_path)

                        <button
                            type="button"
                            class="profile-remove-btn"
                            wire:click="deleteProfilePhoto"
                        >
                            <i class="bi bi-trash3"></i>
                            {{ __('Remove Photo') }}
                        </button>

                    @endif

                </div>

                <x-input-error
                    for="photo"
                    class="profile-input-error"
                />

            </div>

        @endif


        <!-- Name -->
        <div class="profile-field">

            <x-label
                for="name"
                value="{{ __('Name') }}"
                class="profile-field-label"
            />

            <x-input
                id="name"
                type="text"
                class="profile-input"
                wire:model="state.name"
                required
                autocomplete="name"
            />

            <x-input-error
                for="name"
                class="profile-input-error"
            />

        </div>


        <!-- Email -->
        <div class="profile-field">

            <x-label
                for="email"
                value="{{ __('Email Address') }}"
                class="profile-field-label"
            />

            <x-input
                id="email"
                type="email"
                class="profile-input"
                wire:model="state.email"
                required
                autocomplete="username"
            />

            <x-input-error
                for="email"
                class="profile-input-error"
            />


            <!-- Email Verification -->
            @if (
                Laravel\Fortify\Features::enabled(
                    Laravel\Fortify\Features::emailVerification()
                )
                && ! $this->user->hasVerifiedEmail()
            )

                <div class="email-verification-warning">

                    <div class="verification-warning-icon">
                        <i class="bi bi-exclamation-circle"></i>
                    </div>

                    <div class="verification-warning-content">

                        <p>
                            {{ __('Your email address is unverified.') }}
                        </p>

                        <button
                            type="button"
                            wire:click.prevent="sendEmailVerification"
                        >
                            {{ __('Click here to re-send the verification email.') }}
                        </button>

                    </div>

                </div>


                @if ($this->verificationLinkSent)

                    <div class="verification-success-message">

                        <i class="bi bi-check-circle-fill"></i>

                        {{ __('A new verification link has been sent to your email address.') }}

                    </div>

                @endif

            @endif

        </div>

    </x-slot>


    <!-- Actions -->
    <x-slot name="actions">

        <x-action-message
            class="profile-saved-message"
            on="saved"
        >
            <i class="bi bi-check-circle"></i>
            {{ __('Saved.') }}
        </x-action-message>

        <x-button
            wire:loading.attr="disabled"
            wire:target="photo"
            class="profile-save-btn"
        >
            <i class="bi bi-check2"></i>
            {{ __('Save Changes') }}
        </x-button>

    </x-slot>

</x-form-section>
