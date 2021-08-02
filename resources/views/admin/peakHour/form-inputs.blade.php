@php 
    $editing = isset($peakHour);
@endphp

<div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
    <x-inputs.time name="start_time" space="mb:w-full" :label="__('crud.inputs.start_time')" value="{{ old('start_time', ($editing ? $peakHour->start_time : '')) }}"></x-inputs.time>
    <x-inputs.time name="end_time" space="mb:w-full" :label="__('crud.inputs.end_time')" value="{{ old('end_time', ($editing ? $peakHour->end_time : '')) }}"></x-inputs.time>
</div>