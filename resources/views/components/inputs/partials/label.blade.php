@props([
    'extraClasses' => NULL,
    'name',
    'label'
])

<label class="{{ $extraClasses }} dark:text-gray-400 block text-gray-800 text-sm font-semibold mb-2" for="{{ $name }}">
    {{ $label }}
</label>