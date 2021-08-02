@extends('agent.layout.app')

@section('title')
{{ __('crud.admin.agents.name') }} - {{ __('crud.navlinks.dashboard') }}
@endsection

@section('heading')
    {{ __('crud.navlinks.dashboard') }}
@endsection

@push('startScripts')
	<link rel="stylesheet" href="{{asset('css/jquery-jvectormap-2.0.3.css')}}">
@endpush

@section('content')
    <!-- Cards -->
    <div class="grid gap-6 mb-0 md:grid-cols-2 xl:grid-cols-4 mb-4">
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-purple-500 text- bg-purple-100 rounded-full dark:text-purple-100 dark:bg-purple-500">
                <i class="fa p-2 fa-motorcycle"></i>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    {{ __('crud.general.total') }} {{ __('crud.general.rides') }}
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $rides->count() }}
                </p>
            </div>
        </div>
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                <i class="fa p-2 fa-usd"></i>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    {{ __('crud.general.total') }} {{ __('crud.general.earning') }}
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ currency($revenue) }} {{ $rides->count() }}
                </p>
            </div>
        </div>
        <!-- Card -->
        {{-- <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                <i class="fa p-2 fa-2x fa-briefcase"></i>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    @lang('admin.include.wallet')
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ currency($wallet) }}
                </p>
            </div>
        </div> --}}
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div
                class="p-3 mr-4 text-teal-500 rounded-full bg-yellow-100 text-yellow-500 dark:bg-yellow-500 dark:text-yellow-100">
                <i class="fa p-2 fa-times"></i>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    @lang('crud.general.cancelled_rides')
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    @if($cancel_rides == 0) 
                        0
                    @else
                        {{round($cancel_rides/$rides->count(),2)}}%
                    @endif
                </p>
            </div>
        </div>
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div
                class="p-3 mr-4 text-teal-500 rounded-full bg-blue-100 text-blue-500 dark:bg-blue-500 dark:text-blue-100">
                <i class="fa p-2 fa-users"></i>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    {{ __('crud.general.total') }} {{ __('crud.admin.providers.name') }}
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $providers ?? '-' }}
                </p>
            </div>
        </div>
        <!-- Card -->
        {{-- <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div
                class="p-3 mr-4 text-teal-500 rounded-full bg-yellow-100 text-yellow-500 dark:bg-yellow-500 dark:text-yellow-100">
                <i class="fa p-2 fa-2x fa-gavel"></i>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    @lang('admin.dashboard.passengers')
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $passengers ?? '-' }}
                </p>
            </div>
        </div> --}}
    </div>
    
    <h2 class="mt-4 mb-4 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Recent Requests
    </h2>

    <div class="container-fluid">
        <div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="text-center px-4 py-3">{{ __('crud.inputs.SNo') }}</th>
                            <th class="text-center px-4 py-3">{{ __('crud.general.user') }} {{ __('crud.inputs.name') }}</th>
                            <th class="text-center px-4 py-3">{{ __('crud.inputs.status') }}</th>
                            <th class="text-center px-4 py-3">{{ __('crud.general.happened') }}</th>
                            <th class="text-center px-4 py-3">{{ __('crud.general.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        {{-- Approved --}}
                        @forelse($rides as $index => $ride)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{ $loop->index + 1 }}</td>
                                <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                    <p class="font-semibold text-gray-700 dark:text-gray-400">{{ $ride->user->name }}</p>
                                </td>
                                <td class="px-4 py-3 text-sm text-center dark:text-gray-400 dark:bg-gray-800">
                                    {{ $ride->status ? ucfirst(strtolower($ride->status)) : '-' }}
                                </td>
                                <td class="px-4 py-3 text-sm text-center">
                                    <span class="dark:text-gray-400 dark:bg-gray-800 text-muted">{{$ride->created_at->diffForHumans()}}</span>
                                </td>
                                <td class="px-4 py-3 text-sm text-center flex justify-center w-full">
                                    <a class="bg-yellow-400 text-white rounded-full flex w-8 h-8 justify-center items-center hover:bg-yellow-500 mx-1" href="{{ route('agent.showUserRequest', $ride->id) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
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
            {{-- <div class="">
                {!! $rides->links() !!}
            </div> --}}
        </div>
    </div>
@endsection

@push('endScripts')
	
    <script type="text/javascript" src="{{asset('js/jvectormap/jquery-jvectormap-2.0.3.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jvectormap/jquery-jvectormap-world-mill.js')}}"></script>

	<script type="text/javascript">
		$(document).ready(function(){

		        /* Vector Map */
		    $('#world').vectorMap({
		        zoomOnScroll: false,
		        map: 'world_mill',
		        markers: [
		        @foreach($rides as $ride)
		        	@if($ride->status != "CANCELLED")
		            {latLng: [{{$ride->s_latitude}}, {{$ride->s_longitude}}], name: '{{$ride->user->first_name}}'},
		            @endif
		        @endforeach

		        ],
		        normalizeFunction: 'polynomial',
		        backgroundColor: 'transparent',
		        regionsSelectable: true,
		        markersSelectable: true,
		        regionStyle: {
		            initial: {
		                fill: 'rgba(0,0,0,0.15)'
		            },
		            hover: {
		                fill: 'rgba(0,0,0,0.15)',
		            stroke: '#fff'
		            },
		        },
		        markerStyle: {
		            initial: {
		                fill: '#43b968',
		                stroke: '#fff'
		            },
		            hover: {
		                fill: '#3e70c9',
		                stroke: '#fff'
		            }
		        },
		        series: {
		            markers: [{
		                attribute: 'fill',
		                scale: ['#43b968','#a567e2', '#f44236'],
		                values: [200, 300, 600, 1000, 150, 250, 450, 500, 800, 900, 750, 650]
		            },{
		                attribute: 'r',
		                scale: [5, 15],
		                values: [200, 300, 600, 1000, 150, 250, 450, 500, 800, 900, 750, 650]
		            }]
		        }
		    });
		});
	</script>

@endpush