<x-guest-layout>
  <link rel="stylesheet" href="{{ asset('custom-assets/css/style.css') }}">

    <div class="verification-page">

        <div class="verification-card">

            <!-- Logo -->
            <!-- <div>
                <x-authentication-card-logo />
            </div> -->

            <!-- Icon -->
            <div class="verification-icon">
                <i class="bi bi-envelope-check"></i>
            </div>

            <!-- Heading -->
            <div class="verification-heading">
                <h2>Verify Your Email</h2>

                <p>
                    Before continuing, please verify your email address
                    by clicking the link we just sent to your inbox.
                </p>

                <p>
                    If you didn't receive the email, we can send you
                    another verification link.
                </p>
            </div>

            <!-- Success Message -->
            @if (session('status') == 'verification-link-sent')
                <div class="verification-success">
                    <i class="bi bi-check-circle-fill"></i>

                    <span>
                        A new verification link has been sent to your
                        email address.
                    </span>
                </div>
            @endif

            <!-- Resend -->
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <button type="submit" class="verification-btn">
                    <i class="bi bi-envelope"></i>
                    Resend Verification Email
                </button>
            </form>

            <!-- Bottom Actions -->
            <div class="verification-actions">

                <a href="{{ route('profile.show') }}" class="verification-link">
                    Edit Profile
                </a>

                <span class="verification-divider">|</span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="verification-link logout-link">
                        Log Out
                    </button>
                </form>

            </div>

        </div>

    </div>

</x-guest-layout>
