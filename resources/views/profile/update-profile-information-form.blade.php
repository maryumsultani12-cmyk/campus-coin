<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        <h2 class="two-factor-title">Profile information</h2>
    </x-slot>

    <x-slot name="description">
        <p class="text-sm  two-factor-description text-gray-500">Update your account's profile information and email address.</p>
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <input type="file" id="photo" class="hidden"
                            wire:model.live="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-label for="photo" value="{{ __('Photo') }}" class="font-medium text-gray-700" />

                <div class="mt-3 flex items-center gap-5">
                    <!-- Current / Preview Photo -->
                    <div class="relative">
                        <div x-show="! photoPreview" class="size-20 rounded-full ring-4 ring-gray-100 overflow-hidden shadow-sm">
                            <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="size-full object-cover">
                        </div>

                        <span x-show="photoPreview" style="display: none;"
                              class="block size-20 rounded-full bg-cover bg-no-repeat bg-center ring-4 ring-gray-100 shadow-sm"
                              x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                        </span>
                    </div>

                    <div class="flex flex-col gap-2">
                        <x-secondary-button type="button"
                            class="!rounded-lg !px-4 !py-2 hover:!bg-gray-100 transition"
                            x-on:click.prevent="$refs.photo.click()">
                            {{ __('Select A New Photo') }}
                        </x-secondary-button>

                        @if ($this->user->profile_photo_path)
                            <button type="button"
                                wire:click="deleteProfilePhoto"
                                class="text-sm text-red-600 hover:text-red-700 font-medium text-left transition">
                                {{ __('Remove Photo') }}
                            </button>
                        @endif
                    </div>
                </div>

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Name') }}" class="font-medium text-gray-700" />
            <x-input id="name" type="text"
                class="mt-1.5 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition"
                wire:model="state.name" required autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Email') }}" class="font-medium text-gray-700" />
            <x-input id="email" type="email"
                class="mt-1.5 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition"
                wire:model="state.email" required autocomplete="username" />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <div class="mt-3 rounded-lg bg-amber-50 border border-amber-200 p-3">
                    <p class="text-sm text-amber-800">
                        {{ __('Your email address is unverified.') }}
                        <button type="button" class="underline font-medium hover:text-amber-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500" wire:click.prevent="sendEmailVerification">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if ($this->verificationLinkSent)
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo"
            class="profile-save !rounded-lg !px-6 !py-2.5 shadow-sm hover:shadow transition">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>