<x-form-section submit="updatePassword">
    <x-slot name="title">
        <h2 class="text-lg font-semibold text-gray-900">{{ __('Update Password') }}</h2>
    </x-slot>

    <x-slot name="description">
        <p class="text-sm text-gray-500">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </x-slot>

    <x-slot name="form">
        <!-- Current Password -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="current_password" value="{{ __('Current Password') }}" class="font-medium text-gray-700" />
            <x-input id="current_password" type="password"
                class="mt-1.5 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition"
                wire:model="state.current_password" autocomplete="current-password" />
            <x-input-error for="current_password" class="mt-2" />
        </div>

        <!-- New Password -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="password" value="{{ __('New Password') }}" class="font-medium text-gray-700" />
            <x-input id="password" type="password"
                class="mt-1.5 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition"
                wire:model="state.password" autocomplete="new-password" />
            <x-input-error for="password" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="font-medium text-gray-700" />
            <x-input id="password_confirmation" type="password"
                class="mt-1.5 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition"
                wire:model="state.password_confirmation" autocomplete="new-password" />
            <x-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled"
            class="!rounded-lg !px-6 !py-2.5 shadow-sm hover:shadow transition">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>