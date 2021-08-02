@props(['href'])
@php
    $isActive = ($active ?? false) ? 'bg-purple-600 ' : '';
@endphp

<li class="px-2 py-0.5 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
    <a class="w-full" href="{{ $href }}">{{ $slot }}</a>
</li>