@props([
'status'
])
@if (in_array($status ,
['COMPLETED']))
<span
    class="px-2 py-1 font-semibold leading-tight text-green-600 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100 text-xs">
    {{$status}}
</span>
@elseif(in_array($status ,
['SEARCHING','ACCEPTED','STARTED','ARRIVED','PICKEDUP','DROPPED']))
<span
    class="px-2 py-1 font-semibold leading-tight text-yellow-600 bg-yellow-100 rounded-full dark:text-yellow-100 dark:bg-yellow-700 text-xs">
    {{$status}}
</span>
@elseif($status =='SCHEDULED')
<span
    class="px-2 py-1 font-semibold leading-tight text-orange-600 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-700 text-xs">
    {{$status}}
</span>
@elseif($status =='CANCELLED')
<span
    class="px-2 py-1 font-semibold leading-tight text-red-600 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700 text-xs">
    {{$status}}
</span>
@endif