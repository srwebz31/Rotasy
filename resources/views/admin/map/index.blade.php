@extends('admin.layout.app')

@section('title')
    Admin - {{ __('crud.admin.maps.index') }}
@endsection

@section('heading')
    {{ __('crud.admin.maps.index') }}
@endsection

@push('startScripts')
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
@endpush

@section('content')
    <div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
        <div class="w-full overflow-x-auto">
            <div id="map" style="height: 500px"></div>
            <div id="legend" class="bg-gray-50 p-4 m-4 border-2">
                <h2 class="font-semibold text-lg mb-1">Note:</h2>
            </div>
        </div>
    </div>
    <style type="text/css">
        #legend img {
            display: inline;
        }
      </style>
@endsection

@push('endScripts')
    <script>
        let map;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 16,
                center: new google.maps.LatLng({{ $ref }}),
                mapTypeId: "roadmap",
            });
            const icons = {
                provider_available: {
                    name: "Provider Working",
                    icon: "{{ asset('img/map_icons/marker-provider-available.png') }}",
                },
                provider_inactive: {
                    name: "Provider Inactive",
                    icon: "{{ asset('img/map_icons/marker-provider-inactive.png') }}",
                },
                user: {
                    name: "User",
                    icon: "{{ asset('img/map_icons/marker-user.png') }}",
                },
            };
            const features = [
                @forelse($users as $user)
                    {
                        position: new google.maps.LatLng( {{ $user->latitude }}, {{ $user->longitude }}),
                        type: "user",
                    },
                @empty
                @endforelse

                @forelse($active_providers as $p)
                    {
                        position: new google.maps.LatLng({{ $p->s_latitude }}, {{ $p->s_longitude }}),
                        type: "provider_available",
                    },
                @empty
                @endforelse
                
                @forelse($inactive_providers as $p)
                    {
                        position: new google.maps.LatLng({{ $p->latitude }}, {{ $p->longitude }}),
                        type: "provider_inactive",
                    },
                @empty
                @endforelse
            ];
            features.forEach((feature) => {
                new google.maps.Marker({
                    position: feature.position,
                    icon: icons[feature.type].icon,
                    map: map,
                });
            });
            const legend = document.getElementById("legend");

            for (const key in icons) {
                const type = icons[key];
                const name = type.name;
                const icon = type.icon;
                const div = document.createElement("div");
                div.innerHTML = '<img src="' + icon + '"> ' + name;
                legend.appendChild(div);
            }
            map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(legend);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{config('constants.map_key')}}&callback=initMap&libraries=&v=weekly" async></script>
@endpush