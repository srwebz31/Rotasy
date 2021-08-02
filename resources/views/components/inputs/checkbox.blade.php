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

<div class="col-span-3">
    <input
        type="checkbox"
        name="{{ $name }}"
        value="{{ $value ?? 1 }}"
        {{ $checked ? 'checked' : '' }}
        {{ $attributes->merge(['class' => 'form-check-input']) }}
        id="{{ $label }}"
    >
    @if($label ?? null)
        <x-inputs.partials.label extraClasses="inline relative bottom-2px" :name="$label" :label="$label"></x-inputs.partials.label>
    @endif
</div>