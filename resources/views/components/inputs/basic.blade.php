@props([
    'name',
    'label',
    'value',
    'type',
    'min' => null,
    'max' => null,
    'step' => null,
    'idSuff' => null,
    'showError' => false,
])

@if($label ?? null)
    @include('components.inputs.partials.label')
@endif

<input
    type="{{ $type }}"
    id="{{ $name }}{{ $idSuff }}"
    name="{{ $name }}"
    value="{{ old($name, $value ?? '') }}"
    {{ ($required ?? false) ? 'required' : '' }}
    {{ isset($min) ? "min={$min}" : '' }}
    {{ isset($max) ? "max={$max}" : '' }}
    {{ $step ? "step={$step}" : '' }}
    autocomplete="off"
    {{ $attributes }}
    class="appearance-none w-full p-4 text-xs font-semibold leading-none rounded outline-none bg-gray-50 dark:bg-gray-700 dark:text-gray-300"
    placeholder="Enter {{ $label }}"
>
@if($showError)
    @error("$name") <span class="dark:text-red-400 text-red-600 font-semibold text-sm error">** {{ $message }} **</span> @enderror
@endif