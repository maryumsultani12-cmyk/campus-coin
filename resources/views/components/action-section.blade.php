@props([])

<div {{ $attributes->merge(['class' => 'relative  my-5 sm:mx-6 lg:mx-8 rounded-2xl border border-gray-100 bg-white shadow-sm overflow-hidden']) }}>

    {{-- Dark blue accent bar on the left --}}
    <div class="absolute inset-y-0 left-0 w-1 bg-blue-900"></div>

    <div class="pl-6 pr-4 sm:pl-8 sm:pr-6">
        <div class="pt-6">
            <x-section-title>
                <x-slot name="title">{{ $title }}</x-slot>
                <x-slot name="description">{{ $description }}</x-slot>
            </x-section-title>
        </div>

        <div class="py-6">
            {{ $content }}
        </div>
    </div>

</div>