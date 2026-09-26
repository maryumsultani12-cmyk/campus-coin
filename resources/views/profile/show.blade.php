@extends('layouts.admin-layout')

@section('content')

<div class="campus-profile-page">

    <div class="campus-profile-header">
        <span>ACCOUNT</span>
        <h2>My Profile</h2>
    </div>

    <div class="campus-profile-content">

        @livewire('profile.update-profile-information-form')

        @livewire('profile.update-password-form')

        @livewire('profile.two-factor-authentication-form')

        @livewire('profile.logout-other-browser-sessions-form')

        @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
            @livewire('profile.delete-user-form')
        @endif

    </div>

</div>

@endsection