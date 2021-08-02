@props([
'name',
'label',
'type' => 'text',
'space' => null,
])

<div class="w-full px-4 mb-4 md:mb-0 {{ $space ? $space : "md:w-1/2" }}">
    <div class="mb-6">
        @if($label ?? null)
        @include('components.inputs.partials.label')
        @endif
        <div class="relative">
            <select
                class="appearance-none w-full p-4 text-xs font-semibold leading-none bg-gray-50 rounded outline-none dark:bg-gray-700 dark:text-gray-300"
                id="{{ $name }}" name="{{ $name }}" {{ ($required ?? false) ? 'required' : '' }} autocomplete="off"
                {{ $attributes }}>
                {{ $slot }}
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                </svg>
            </div>
        </div>
    </div>
</div>