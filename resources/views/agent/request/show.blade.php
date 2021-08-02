@extends('agent.layout.app')

@section('title', 'Request details ')

@section('heading', __('admin.request.request_details'))

@section('content')
    <div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
        <div class="w-full overflow-x-auto">
            <div id="map"></div>
            <table class="w-full whitespace-no-wrap">
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                            @lang('admin.request.Booking_ID')
                        </td>
                        <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                            {{ $request->booking_id }}
                        </td>
                    </tr>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                            @lang('admin.request.User_Name')
                        </td>
                        <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                            {{ $request->user->first_name }}
                        </td>
                    </tr>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                            @lang('admin.request.Provider_Name')
                        </td>
                        <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                            @if($request->provider)
                                {{ $request->provider->first_name }}</dd>
                            @else
                                @lang('admin.request.provider_not_assigned')
                            @endif
                        </td>
                    </tr>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                            @lang('admin.request.total_distance')
                        </td>
                        <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                            {{ $request->distance ? $request->distance : '-' }} {{ $request->unit }}
                        </td>
                    </tr>
                    @if($request->status == 'SCHEDULED')
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                @lang('admin.request.ride_scheduled_time')
                            </td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                @if($request->schedule_at != "")
                                    {{ date('jS \of F Y h:i:s A', strtotime($request->schedule_at)) }}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @else
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                @lang('admin.request.ride_start_time')
                            </td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                @if($request->started_at != "")
                                    {{ date('jS \of F Y h:i:s A', strtotime($request->started_at)) }}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                @lang('admin.request.ride_end_time')
                            </td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                @if($request->finished_at != "")
                                    {{ date('jS \of F Y h:i:s A', strtotime($request->finished_at)) }}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        <tr class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                @lang('admin.request.pickup_address')
                            </td>
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                {{ $request->s_address ? $request->s_address : '-' }}
                            </td>
                        </tr>

                        <tr class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                @lang('admin.request.drop_address')
                            </td>
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                {{ $request->d_address ? $request->d_address : '-' }}
                            </td>
                        </tr>

                        @if($request->payment)
                            <tr class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">    
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    @lang('admin.request.base_price')
                                </td>
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    {{ currency($request->payment->fixed) }}
                                </td>
                            </tr>
                            @if($request->service_type->calculator=='MIN')
                                <tr class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">    
                                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                        @lang('admin.request.minutes_price')
                                    </td>
                                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                        {{ currency($request->payment->minute) }}
                                    </td>
                                </tr>
                            @endif
                            @if($request->service_type->calculator=='HOUR')
                                <tr class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">    
                                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                        @lang('admin.request.hours_price')
                                    </td>
                                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                        {{ currency($request->payment->hour) }}
                                    </td>
                                </tr>
                            @endif
                            @if($request->service_type->calculator=='DISTANCE')
                                <tr class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">    
                                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                        @lang('admin.request.distance_price')
                                    </td>
                                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                        {{ currency($request->payment->distance) }}
                                    </td>
                                </tr>
                            @endif
                            @if($request->service_type->calculator=='DISTANCEMIN')
                                <tr class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">    
                                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                        @lang('admin.request.minutes_price')
                                    </td>
                                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                        {{ currency($request->payment->minute) }}
                                    </td>
                                </tr>
                                <tr class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                        @lang('admin.request.distance_price')
                                    </td>
                                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                        {{ currency($request->payment->distance) }}
                                    </td>
                                </tr>
                            @endif
                            @if($request->service_type->calculator=='DISTANCEHOUR')
                                <tr class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                        @lang('admin.request.hours_price')
                                    </td>
                                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                        {{ currency($request->payment->hour) }}
                                    </td>
                                </tr>
                                <tr class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                        @lang('admin.request.distance_price')
                                    </td>
                                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                        {{ currency($request->payment->distance) }}
                                    </td>
                                </tr>
                            @endif
                            <tr class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    @lang('admin.request.commission')
                                </td>
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    {{ currency($request->payment->commision) }}
                                </td>
                            </tr>

                            <tr class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    @lang('admin.request.fleet_commission')
                                </td>
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    {{ currency($request->payment->fleet) }}
                                </td>
                            </tr>

                            <tr class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    @lang('admin.request.discount_price')
                                </td>
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    {{ currency($request->payment->discount) }}
                                </td>
                            </tr>

                            <tr class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    @lang('admin.request.peak_amount')
                                </td>
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    {{ currency($request->payment->peak_amount) }}
                                </td>
                            </tr>

                            <tr class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    @lang('admin.request.peak_commission')
                                </td>
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    {{ currency($request->payment->peak_comm_amount) }}
                                </td>
                            </tr>

                            <tr class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    @lang('admin.request.waiting_charge')
                                </td>
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    {{ currency($request->payment->waiting_amount) }}
                                </td>
                            </tr>

                            <tr class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    @lang('admin.request.waiting_commission')
                                </td>
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    {{ currency($request->payment->waiting_comm_amount) }}
                                </td>
                            </tr>

                            <tr class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    @lang('admin.request.tax_price')
                                </td>
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    {{ currency($request->payment->tax) }}
                                </td>
                            </tr>

                            {{-- <dt class="col-sm-4">@lang('admin.request.surge_price') :</dt>
                            <dd class="col-sm-8">{{ currency($request->payment->surge) }}</dd> --}}

                            <tr class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    @lang('admin.request.tips')
                                </td>
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    {{ currency($request->payment->tips) }}
                                </td>
                            </tr>

                            <tr class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    @lang('user.ride.round_off')
                                </td>
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    {{ currency($request->payment->round_of) }}
                                </td>
                            </tr>

                            <tr class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    @lang('admin.request.total_amount')
                                </td>
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    {{ currency($request->payment->total+$request->payment->tips) }}
                                </td>
                            </tr>

                            <tr class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    @lang('admin.request.wallet_deduction')
                                </td>
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    {{ currency($request->payment->wallet) }}
                                </td>
                            </tr>

                            <tr class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    @lang('admin.request.payment_mode')
                                </td>
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    {{ $request->payment->payment_mode=="CASH"?'DINHEIRO':'CARTÃO' }}
                                </td>
                            </tr>
                            @if($request->payment->payment_mode=='CASH')
                                <tr class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                        @lang('admin.request.cash_amount')
                                    </td>
                                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                        {{ currency($request->payment->cash) }}
                                    </td>
                                </tr>
                            @else
                                <tr class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                        @lang('admin.request.card_amount')
                                    </td>
                                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                        {{ currency($request->payment->card) }}
                                    </td>
                                </tr>
                            @endif

                            <tr class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    @lang('admin.request.provider_earnings')
                                </td>
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    {{ currency($request->payment->ride_status) }}
                                </td>
                            </tr>
                            <tr class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    @lang('admin.request.provider_earnings')
                                </td>
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    @if($request->status == "COMPLETED")
                                        COMPLETED
                                    @else
                                        {{ $request->status }}
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('endScripts')
    <style type="text/css">
        #map {
            height: 450px;
        }
    </style>

    <script type="text/javascript">
        var map;
        var zoomLevel = 11;

        function initMap() {

            map = new google.maps.Map(document.getElementById('map'));

            var marker = new google.maps.Marker({
                map: map,
                icon: '/asset/img/marker-start.png',
                anchorPoint: new google.maps.Point(0, -29)
            });

            var markerSecond = new google.maps.Marker({
                map: map,
                icon: '/asset/img/marker-end.png',
                anchorPoint: new google.maps.Point(0, -29)
            });

            var bounds = new google.maps.LatLngBounds();

            source = new google.maps.LatLng({{ $request->s_latitude }}, {{ $request->s_longitude }});
            destination = new google.maps.LatLng({{ $request->d_latitude }}, {{ $request->d_longitude }});

            marker.setPosition(source);
            markerSecond.setPosition(destination);

            var directionsService = new google.maps.DirectionsService;
            var directionsDisplay = new google.maps.DirectionsRenderer({suppressMarkers: true, preserveViewport: true});
            directionsDisplay.setMap(map);

            directionsService.route({
                origin: source,
                destination: destination,
                travelMode: google.maps.TravelMode.DRIVING
            }, function (result, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    console.log(result);
                    directionsDisplay.setDirections(result);

                    marker.setPosition(result.routes[0].legs[0].start_location);
                    markerSecond.setPosition(result.routes[0].legs[0].end_location);
                }
            });

            @if($request->provider && $request->status != 'COMPLETED')
                var markerProvider = new google.maps.Marker({
                        map: map,
                        icon: "/asset/img/marker-car.png",
                        anchorPoint: new google.maps.Point(0, -29)
                    });

                provider = new google.maps.LatLng({{ $request->provider->latitude }}, {{ $request->provider->longitude }});
                markerProvider.setVisible(true);
                markerProvider.setPosition(provider);
                console.log('Provider Bounds', markerProvider.getPosition());
                bounds.extend(markerProvider.getPosition());
            @endif

            bounds.extend(marker.getPosition());
            bounds.extend(markerSecond.getPosition());
            map.fitBounds(bounds);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ Config::get('constants.map_key') }}&libraries=places&callback=initMap"
            async defer></script>

@endpush