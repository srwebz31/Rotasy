@props([
    'name',
    'label',
    'value',
    'space' => NULL,
])

<div class="w-full px-4 mb-4 md:mb-0 {{ $space ? $space : "md:w-1/2" }}">
    <div class="mb-6">
        <x-inputs.basic type="email" :name="$name" label="{{ $label ?? ''}}" :value="$value" :attributes="$attributes"></x-inputs.basic>
    </div>
</div>