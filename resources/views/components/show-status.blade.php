@props([
'status'
])
@if ($status == "1")
<span
    class="px-2 py-1 font-semibold leading-tight text-green-600 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100 text-xs">
    Enabled
</span>
@elseif($status == "0")
<span
    class="px-2 py-1 font-semibold leading-tight text-red-600 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700 text-xs">
    Disabled
</span>
@endif