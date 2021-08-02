@extends('admin.layout.app')

@section('title')
    Admin - {{ __('crud.admin.customPushes.index') }}
@endsection

@section('heading')
    {{ __('crud.admin.customPushes.index') }}
@endsection

@section('content')
    <x-indexPageSearch :addBtnRoute="route('admin.customPush.create')" :addBtnText="__('crud.admin.customPushes.create')"></x-indexPageSearch>
    <div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.SNo') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.type') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.condition') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.condition_data') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.message') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.sent_to') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.schedule_at') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.general.actions') }}</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    {{-- Approved --}}
                    @forelse ($customPushes as $customPush)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{ $loop->index + 1 }}</td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                {{ $customPush->send_to ?? '-' }}
                            </td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                {{ $customPush->condition ?? '-' }}
                            </td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                {{ $customPush->condition_data ?? '-' }}
                            </td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                {{ $customPush->message ?? '-' }}
                            </td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                {{ $customPush->sent_to ?? '-' }}
                            </td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                {{ $customPush->schedule_at ?? '-' }}
                            </td>
                            <td>
                                <div class="flex items-center justify-center">
                                    {{-- <x-buttons.show :link="route('admin.admin.show', $customPush)"></x-buttons.show> --}}
                                    {{-- <x-buttons.edit :link="route('admin.customPush.edit', $customPush)"></x-buttons.edit> --}}
                                    <x-buttons.delete :link="route('admin.customPush.destroy', $customPush)"></x-buttons.delete>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 py-3 text-sm" colspan="10">
                                @lang('crud.general.not_found')
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{-- Pagination --}}
        <div class="">
            {!! $customPushes->links() !!}
        </div>
    </div>
@endsection

@push('endScripts')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('constants.map_key') }}&libraries=places,drawing&callback=initMap" async defer></script>
    <script>
        var map;

        function initMap() {
            var userLocation = new google.maps.LatLng(0.0236, 37.9062);
            const searchBox = new google.maps.places.SearchBox(city_name);

            map = new google.maps.Map(document.getElementById('map'), {
                center: userLocation,
                zoom: 15,
            });

            map.addListener("bounds_changed", () => {
                searchBox.setBounds(map.getBounds());
            });

            let markers = [];
            
            searchBox.addListener("places_changed", () => {
                const places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }
            
                // Clear out the old markers.
                markers.forEach((marker) => {
                    marker.setMap(null);
                });
                markers = [];
                
                // For each place, get the icon, name and location.
                const bounds = new google.maps.LatLngBounds();

                places.forEach((place) => {
                    if (!place.geometry || !place.geometry.location) {
                        firstCoordinates = null;
                        console.log("Returned place contains no geometry");
                        return;
                    }

                    firstCoordinates = place.geometry.location.lat() + ',' + place.geometry.location.lng();
                
                    const icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25),
                    };
                
                    // Create a marker for each place.
                    markers.push(
                        new google.maps.Marker({
                            map,
                            icon,
                            title: place.name,
                            position: place.geometry.location,
                        })
                    );

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });

                map.fitBounds(bounds);
            });
        }

        initMap();
    </script>
@endpush