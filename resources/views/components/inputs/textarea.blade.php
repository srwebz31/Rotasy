@props([
    'name',
    'label',
    'space' => null,
])

<div class="w-full px-4 mb-4 md:mb-0 {{ $space ? $space : "md:w-1/2" }}">
    <div class="mb-6">
        @if($label ?? null)
            @include('components.inputs.partials.label')
        @endif
        <textarea 
            id="{{ $name }}"
            name="{{ $name }}"
            rows="3"
            {{ ($required ?? false) ? 'required' : '' }}
            autocomplete="off"
            class="appearance-none w-full p-4 text-xs font-semibold leading-none bg-gray-50 rounded outline-none dark:bg-gray-700 dark:text-gray-300"
        >{{$slot}}</textarea>
    </div>
</div>