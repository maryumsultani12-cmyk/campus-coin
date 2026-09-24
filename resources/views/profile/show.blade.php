<x-app-layout>

    <x-slot name="header">
        <div class="profile-page-header">
            <div>
                <span class="profile-header-small">
                    {{ __('ACCOUNT') }}
                </span>

                <h2 class="profile-header-title">
                    {{ __('My Profile') }}
                </h2>
            </div>
        </div>
    </x-slot>


    <div class="profile-page">

        <div class="profile-container">

            <!-- Profile Information -->
            <div class="profile-card-wrapper">
                @livewire('profile.update-profile-information-form')
            </div>


            <!-- Update Password -->
            <div class="profile-card-wrapper">
                @livewire('profile.update-password-form')
            </div>


            <!-- Two Factor Authentication -->
            <div class="profile-card-wrapper">
                @livewire('profile.two-factor-authentication-form')
            </div>


            <!-- Browser Sessions -->
            <div class="profile-card-wrapper">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>


            <!-- Delete Account -->
            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())

                <div class="profile-card-wrapper profile-delete-section">
                    @livewire('profile.delete-user-form')
                </div>

            @endif

        </div>

    </div>

</x-app-layout>
