@php 
    $editing = isset($customPush);
@endphp

<div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
    @php
        $send_to = old('send_to', '');
    @endphp
    
    <div id="map" class="hidden"></div>

    @livewire('custom-push', [
        'send_to' => old('send_to', NULL),
        'condition' => $send_to == 'USERS' ? old('user_condition', NULL) : old('provider_condition', NULL),
        'condition_data' => old('condition_data', NULL),
        'scheduled_at' => old('schedule_at', NULL)
    ])
    
    <x-inputs.textarea space="w-full" :label="__('crud.inputs.message')" name="message" placeholder="max. 255 Characters">{{ old('message', '') }}</x-inputs.textarea>
</div>
@push('endScripts')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('constants.map_key') }}&libraries=places,geocoding"></script>

    <script>
        var map;
        let autcomplete;
        function initMap() {
            autocomplete = new google.maps.places.Autocomplete(document.getElementById('location'), {
                types: ['establishment'],
                fields: ['name']
            });
        }

        Livewire.on('loadSearchBox', function() {
            console.log("called this function");
            initMap();
        });

        initMap();
    </script>
@endpush