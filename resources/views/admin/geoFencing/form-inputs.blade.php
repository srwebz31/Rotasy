@php 
    $editing = isset($role);
@endphp

<div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
    <x-inputs.text name="city_name" space="mb:w-full" :label="__('crud.inputs.city').' '.__('crud.inputs.name')" value="{{ old('city_name', ($editing ? $role->name : '')) }}"></x-inputs.text> 
    <div class="w-full px-4 mb-4 md:mb-0">
        <div class="mb-6">
            <div id="map" class="" style="height: 500px;"></div>
        </div>
    </div>
</div>
@push('endScripts')
    <script>
        function initMap() {
            const map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: -34.397, lng: 150.644 },
                zoom: 8,
            });
            const drawingManager = new google.maps.drawing.DrawingManager({
                drawingMode: google.maps.drawing.OverlayType.MARKER,
                drawingControl: true,
                drawingControlOptions: {
                    position: google.maps.ControlPosition.TOP_CENTER,
                    drawingModes: [
                        google.maps.drawing.OverlayType.MARKER,
                        google.maps.drawing.OverlayType.CIRCLE,
                        google.maps.drawing.OverlayType.POLYGON,
                        google.maps.drawing.OverlayType.POLYLINE,
                        google.maps.drawing.OverlayType.RECTANGLE,
                    ],
                },
                markerOptions: {
                    icon: "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png",
                },
                circleOptions: {
                    fillColor: "#ffff00",
                    fillOpacity: 1,
                    strokeWeight: 5,
                    clickable: false,
                    editable: true,
                    zIndex: 1,
                },
            });
            drawingManager.setMap(map);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVc7_dvlorBLtG5mEAiADsLGMWR4Y6uEU&callback=initMap&libraries=drawing&v=weekly" async></script>
@endpush