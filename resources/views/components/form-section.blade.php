@props(['submit'])

<div {{ $attributes->merge(['class' => 'relative rounded-2xl border mx-5 border-gray-100 bg-white shadow-sm overflow-hidden']) }}>

    {{-- Teal accent bar on the left --}}
    <div class="absolute inset-y-0 left-0 w-1 bg-blue-900"></div>

    <div class="pl-6 pr-4 sm:pl-8 sm:pr-6">
        <div class="pt-6">
            <x-section-title>
                <x-slot name="title">{{ $title }}</x-slot>
                <x-slot name="description">{{ $description }}</x-slot>
            </x-section-title>
        </div>

        <form wire:submit="{{ $submit }}">
            <div class="py-6">
                <div class="grid grid-cols-6 gap-6">
                    {{ $form }}
                </div>
            </div>

            @if (isset($actions))
                <div class="flex items-center justify-end gap-3 border-t border-gray-100 py-4 -mx-2 px-2">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>

</div>