@extends('admin.layout.app')

@section('title')
Admin - {{ __('crud.navlinks.dashboard') }}
@endsection

@section('heading')
{{ __('crud.navlinks.dashboard') }}
@endsection

@push('startScripts')
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
{{-- Charts --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
<script src="{{ asset('js/charts/charts-lines.js') }}" defer></script>
<script src="{{ asset('js/charts/charts-pie.js') }}" defer></script>
<script src="https://unpkg.com/@googlemaps/markerclustererplus/dist/index.min.js"></script>

<link rel="stylesheet" href="{{ asset('css/jquery-jvectormap.css')}}">
@endpush

@section('content')
<!-- Cards -->
<div class="grid gap-6 mb-0 md:grid-cols-2 xl:grid-cols-4">
    <!-- Card -->
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-purple-500 text- bg-purple-100 rounded-full dark:text-purple-100 dark:bg-purple-500">
            <i class="fa p-2 fa-2x fa-users"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Total clients
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ $user_count }}
            </p>
        </div>
    </div>
    <!-- Card -->
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
            <i class="fa p-2 fa-2x fa-user-secret"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Total Agents
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ $agent_count }}
            </p>
        </div>
    </div>
    <!-- Card -->
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
            <i class="fa p-2 fa-2x fa-briefcase"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Total Provider
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ $provider_count }}
            </p>
        </div>
    </div>
    <!-- Card -->
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div
            class="p-3 mr-4 text-teal-500 rounded-full bg-yellow-100 text-yellow-500 dark:bg-yellow-500 dark:text-yellow-100">
            <i class="fa p-2 fa-2x fa-gavel"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Total Disputes
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ $dispute_count }}
            </p>
        </div>
    </div>
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div
            class="p-3 mr-4 text-teal-500 rounded-full bg-purple-100 text-purple-500 dark:bg-purple-500 dark:text-purple-100">
            <i class="fa p-2 fa-2x fa-motorcycle"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                {{ __('crud.general.total') }} {{ __('crud.general.rides') }}
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ $rides_count }}
            </p>
        </div>
    </div>
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div
            class="p-3 mr-4 text-teal-500 rounded-full bg-green-100 text-green-500 dark:bg-green-500 dark:text-green-100">
            <i class="fa p-2 fa-2x fa-usd"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                {{ __('crud.general.total') }} {{ __('crud.general.earning') }}
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ currency($revenue) }}
            </p>
        </div>
    </div>
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div
            class="p-3 mr-4 text-teal-500 rounded-full bg-yellow-100 text-yellow-500 dark:bg-yellow-500 dark:text-yellow-100">
            <i class="fa p-2 fa-2x fa-times"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                @lang('crud.general.cancelled_rides')
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ $cancelled_rides }}
            </p>
        </div>
    </div>
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div
            class="p-3 mr-4 text-teal-500 rounded-full bg-blue-100 text-blue-500 dark:bg-blue-500 dark:text-blue-100">
            <i class="fa p-2 fa-2x fa-check"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Completed Rides
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ $completed_rides }}
            </p>
        </div>
    </div>
</div>

<!-- User Map -->
<h2 class="mt-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Service Request Map
</h2>
<div class="w-full overflow-hidden rounded-lg shadow-xs mt-6">
    <div class="w-full overflow-x-auto">
        <div id="widgetJvmap" style="height: 500px"></div>
    </div>
</div>

<!-- Charts -->
<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Charts
</h2>
<div class="grid gap-6 mb-0 md:grid-cols-2">
    <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">Revenue</h4>
        <canvas id="pie"></canvas>
    </div>
    <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">Admin Credits</h4>
        <canvas id="line"></canvas>
    </div>
</div>

<!-- Charts -->
<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Recent User Requests
</h2>
<!-- New Table -->
<div class="w-full overflow-hidden mb-8 rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">{{ __('crud.inputs.SNo') }}</th>
                    <th class="px-4 py-3">{{ __('crud.admin.users.name') }}</th>
                    <th class="px-4 py-3">{{ __('crud.inputs.amount') }}</th>
                    <th class="px-4 py-3">{{ __('crud.inputs.status') }}</th>
                    <th class="px-4 py-3">{{ __('crud.inputs.date') }}</th>
                    <th class="text-center px-4 py-3">{{ __('crud.general.actions') }}</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @forelse ($requests as $request)
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">{{ $loop->index+1 }}</td>
                    <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            <!-- Avatar with inset shadow -->
                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                <img class="object-cover w-full h-full rounded-full"
                                    src="{{ $request->user->avatar ? asset('storage/'.$request->user->avatar) : asset('img/avatar.png') }}"
                                    alt="" loading="lazy" />
                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-700 dark:text-gray-400">{{ $request->user->name }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-400">
                        {{ currency($request->payment->total ?? 0) }}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <span class="px-2 py-1 font-semibold leading-tight rounded-full">
                            <x-request-show-status :status="$request->status"></x-request-show-status>
                        </span>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{ $request->created_at->toDate()->format('d/m/Y') }}
                        {{ $request->created_at->format('h:i:s a') }}
                    </td>
                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3 text-sm flex justify-center">
                        <x-buttons.show :link="route('admin.request.detail', $request)"></x-buttons.show>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="px-4 py-3 text-sm text-center" colspan="8">
                        {{ __('crud.general.not_found') }}
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
{{-- <div id="widgetJvmap" class="h-450"></div> --}}
@endsection

@push('endScripts')
<script src="{{ asset('js/jquery-jvectormap.min.js')}}"></script>
<script src="{{ asset('js/maps/jquery-jvectormap-world-mill-en.js')}}"></script>
<script>
    $(function(){
            var plants = [
                {{ $req }}
            ];

            new jvm.Map({
                container: $('#widgetJvmap'),
                map: 'world_mill',
                markers: plants.map(function(h){ return {name: h.name, latLng: h.coords} }),
                markerStyle: {
                    initial: {
                        r: 8,
                        fill: 'purple',
                        stroke: '#383f47'
                    },
                    hover: {
                        r: 12,
                        stroke: ("purple"),
                        'stroke-width': 0
                    }
                },
                labels: {
                    markers: {
                        render: function(index){
                            return '';
                        },
                        offsets: function(index){
                            var offset = plants[index]['offsets'] || [0, 0];
                            return [offset[0] - 7, offset[1] + 3];
                        },
                    }
                },
                series: {
                    regions: [{
                        scale: ['#DEEBF7', '#08519C'],
                        attribute: 'fill',
                    }]
                }
            });
        });
</script>
{{-- <script src="https://maps.googleapis.com/maps/api/js?key={{config('constants.map_key')}}&callback=initMap&libraries=&v=weekly"
async></script> --}}
@endpush