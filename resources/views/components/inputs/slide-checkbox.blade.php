@props([
    'id',
    'name',
    'label',
    'value',
    'checked' => false,
    'addHiddenValue' => true,
    'hiddenValue' => 0,
])

@php
$checked = !! $checked
@endphp

{{-- Adds a hidden default value to be send if checked is false --}}
@if($addHiddenValue)
    <input type="hidden" id="{{  $id ?? $name }}-hidden" name="{{ $name }}" value="{{ $hiddenValue }}">
@endif
<div class="w-full px-4 mb-4 md:mb-0">
    <div class="flex flex-row items-center cursor-pointer mb-6">
        <div class="relative">
            <input type="checkbox" name="{{ $name }}" value="{{ $value ?? 1 }}" {{ $checked ? 'checked' : '' }}
                {{ $attributes->merge(['class' => 'sr-only']) }} id="{{ $name }}">
            <div class="bgg block bg-gray-600 w-14 h-8 rounded-full"></div>
            <div class="dot absolute left-1 top-1 w-6 h-6 rounded-full transition"></div>

        </div>
        @if($label ?? null)
            <x-inputs.partials.label extraClasses="inline relative bottom-2px m-2" :name="$name" :label="$label">
            </x-inputs.partials.label>
        @endif
    </div>
</div>
<style>
    input:checked~.dot {
        transform: translateX(100%);
        background: rgba(249, 250, 251);
    }

    input:checked~.bgg {
        background: rgb(10, 196, 41);
    }

    input:not(:checked)~.dot {
        background: rgba(249, 250, 251);
        opacity: 0.5;
        transform: translateX(0%);
    }
</style>