@props(['active', 'href', 'icon'])
@php
    $isActive = ($active ?? false) ? 'bg-purple-600 ' : '';
    $isActiveColor = ($active ?? false) ? 'dark:text-gray-100 text-gray-800 ' : '';
@endphp

<li class="relative px-6 py-1.5">
    <span class="{{ $isActive }}absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
    <a class="{{ $isActiveColor }}inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="{{ $href }}">
        <i class="fa fa-{{ $icon }}" style="font-size: 1.2rem;"></i>
        <span class="ml-3">
            {{ $slot }}
        </span>
    </a>
</li>