@extends('admin.layout.app')

@section('title')
    Admin - Dispatcher {{ __('crud.navlinks.dashboard') }}
@endsection

@section('heading')
    Dispatcher {{ __('crud.navlinks.dashboard') }}
@endsection

@push('startScripts')
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('constants.map_key') }}&libraries=places,geocoding"></script>
@endpush

@section('content')
    @livewire('dispatcher-dashboard', [
        'active' => request()->has('active') ? request()->active : NULL
    ])
@endsection

@push('endScripts')
    <script>
        function initAutocomplete() {
            const map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: -33.8688, lng: 151.2195 },
                zoom: 13,
                mapTypeId: "roadmap",
            });

            let firstCoordinates = null;
            let secondCoordinates = null;
            
            // Create the search box and link it to the UI element.
            const input = document.getElementById("pac-input");
            const input2 = document.getElementById("pac-input2");

            const searchBox = new google.maps.places.SearchBox(input);
            const searchBox2 = new google.maps.places.SearchBox(input2);

            const directionsService = new google.maps.DirectionsService();
            
            const directionsRenderer = new google.maps.DirectionsRenderer({
                draggable: true,
                map,
                panel: document.getElementById("right-panel"),
            });

            directionsRenderer.addListener("directions_changed", () => {
                computeTotalDistance(directionsRenderer.getDirections());
            });
            
            // Bias the SearchBox results towards current map's viewport.
            map.addListener("bounds_changed", () => {
                searchBox.setBounds(map.getBounds());
                searchBox2.setBounds(map.getBounds());
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

                    var s_lat = place.geometry.location.lat();
                    var s_lng = place.geometry.location.lng();
                    window.livewire.emit('update_s_coordinates', s_lat, s_lng, input.value);

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
                
                if(firstCoordinates && secondCoordinates) {
                    displayRoute(firstCoordinates, secondCoordinates, directionsService, directionsRenderer);
                }

                map.fitBounds(bounds);
            });

            searchBox2.addListener("places_changed", () => {
                const places2 = searchBox2.getPlaces();
                
                if (places2.length == 0) {
                    return;
                }
            
                // Clear out the old markers.
                markers.forEach((marker) => {
                    marker.setMap(null);
                });
                markers = [];
                
                // For each place, get the icon, name and location.
                const bounds2 = new google.maps.LatLngBounds();

                places2.forEach((place) => {

                    if (!place.geometry || !place.geometry.location) {
                        secondCoordinates = null;
                        console.log("Returned place contains no geometry");
                        return;
                    }

                    var d_lat = place.geometry.location.lat();
                    var d_lng = place.geometry.location.lng();
                    var d_address = place.formatted_address;

                    window.livewire.emit('update_d_coordinates', d_lat, d_lng, input2.value);

                    secondCoordinates = place.geometry.location.lat() + ',' + place.geometry.location.lng();
                
                    const icon2 = {
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
                            icon2,
                            title: place.name,
                            position: place.geometry.location,
                        })
                    );

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds2.union(place.geometry.viewport);
                    } else {
                        bounds2.extend(place.geometry.location);
                    }
                });

                if(firstCoordinates && secondCoordinates) {
                    displayRoute(firstCoordinates, secondCoordinates, directionsService, directionsRenderer);
                }

                map.fitBounds(bounds2);
            });
        }

        function locateProvider($latitude, $longitude)
        {
            const myLatLng = { lat: $latitude, lng: $longitude};
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: myLatLng,
            });
            new google.maps.Marker({
                position: myLatLng,
                map,
                title: "Hello World!",
            });
        }

        function displayRoute(origin, destination, service, display) {
            service.route({
                origin: origin,
                destination: destination,
                waypoints: [],
                travelMode: google.maps.TravelMode.DRIVING,
                avoidTolls: true,
            }, (result, status) => {
                if (status === "OK" && result) {
                    display.setDirections(result);
                } else {
                    alert("Could not display directions due to: " + status);
                }
            });
        }

        function computeTotalDistance(result) {
            let total = 0;
            const myroute = result.routes[0];

            if (!myroute) {
                return;
            }

            for (let i = 0; i < myroute.legs.length; i++) {
                total += myroute.legs[i].distance.value;
            }
            total = total / 1000;
            document.getElementById("total").value = total;
            window.livewire.emit('update_distance', total);
        }
        initAutocomplete();

        Livewire.on('clearMap', function() {
            initAutocomplete();
        });

        Livewire.on('updateMap', function($s_lat, $s_lng, $d_lat, $d_lng) {
            const map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: $s_lat, lng: $s_lng},
                zoom: 13,
                mapTypeId: "roadmap",
            });
            const directionsService = new google.maps.DirectionsService();
            const directionsRenderer = new google.maps.DirectionsRenderer({
                draggable: false,
                map,
                panel: document.getElementById("right-panel"),
            });

            directionsRenderer.addListener("directions_changed", () => {
                computeTotalDistance(directionsRenderer.getDirections());
            });

            firstCoordinates = $s_lat + ',' + $s_lng;
            secondCoordinates = $d_lat + ',' + $d_lng;
            displayRoute(firstCoordinates, secondCoordinates, directionsService, directionsRenderer);
        });
        

        // $('form input:not([type="submit"])').keydown(function(e) {
        //     if (e.keyCode == 13) {
        //         e.preventDefault();
        //         return false;
        //     }
        // });
    </script>
@endpush