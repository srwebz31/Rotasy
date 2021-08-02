@props([
    'name',
    'label',
    'value',
    'min' => null,
    'max' => null,
    'step' => null,
    'space' => NULL,
    'idSuff' => null,
    'showError' => false,
])

<div class="w-full px-4 mb-4 md:mb-0 {{ $space ? $space : "md:w-1/2" }}">
    <div class="mb-6">
        <x-inputs.basic :idSuff="$idSuff" type="number" :name="$name" label="{{ $label ?? ''}}" :value="$value" :attributes="$attributes" :min="$min" :max="$max" :step="$step" :showError="$showError"></x-inputs.basic>
    </div>
</div>