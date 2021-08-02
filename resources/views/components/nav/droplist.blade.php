@props(['active', 'title', 'href', 'icon'])
@php
    $isActive = ($active ?? false) ? 'bg-purple-600 ' : '';
    $isActiveColor = ($active ?? false) ? 'dark:text-gray-100 text-gray-800 ' : '';
@endphp


<li class="relative px-6 py-1.5">
    <div x-data="{ {{ $href }} : {{ $active ? "true" : "false" }} }">
        <span class="{{ $isActive }}absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
        <button class="{{ $isActiveColor }}inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" @click="{{$href}}=!{{$href}}" aria-haspopup="true">
            <span class="inline-flex items-center">
                <i class="fa hover:text-gray-800 dark:hover:text-gray-200 fas fa-{{ $icon }}" style="font-size: 1.2rem;"></i>
                <span class="hover:text-gray-800 dark:hover:text-gray-200 ml-4">{{ $title }}</span>
            </span>
            <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </button>
        <div x-show="{{$href}}">
            <ul
                x-transition:enter="transition-all ease-in-out duration-300"
                x-transition:enter-start="opacity-25 max-h-0"
                x-transition:enter-end="opacity-100 max-h-xl"
                x-transition:leave="transition-all ease-in-out duration-300"
                x-transition:leave-start="opacity-100 max-h-xl"
                x-transition:leave-end="opacity-0 max-h-0"
                class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900" 
                aria-label="submenu"
            >
                {{ $slot }}
            </ul>
        </div>
    </div>
</li>