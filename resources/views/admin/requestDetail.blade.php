@section('content')
    <section class="container h-full ">
        <div class="w-full px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="col-span-1 grid grid-cols-3">
                    <p class="mb-4 col-span-3 text-gray-600 dark:text-gray-400">
                        <span class="font-semibold">{{ __('crud.inputs.booking_id') ?? '' }}</span>:
                        {{ $userRequest->booking_id ?? '' }}
                        <br>
                        <span class="font-semibold">{{ __('crud.inputs.date') ?? '' }}</span>:
                        {{ $userRequest->created_at ?? '' }}
                        <br>
                        <span class="font-semibold">{{ __('crud.navlinks.request') ?? '' }}
                            {{ __('crud.inputs.status') ?? '' }}</span>:
                        <x-request-show-status :status="$userRequest->status"></x-request-show-status>
                    </p>
                    <p class="text-gray-600 dark:text-gray-400 md:col-span-1 col-span-2 md:mb-0 mb-3">
                        <span
                            class="font-semibold text-gray-800 dark:text-gray-300 text-base">{{ __('crud.admin.users.name') ?? '' }}
                            {{ __('crud.general.details') ?? '' }}</span> <br>
                        {{ $userRequest->user->name ?? '' }} <br>
                        {{ $userRequest->user->email ?? '' }} <br>
                        {{ $userRequest->user->mobile ?? '' }} <br>
                        User Rating:- {{ $userRequest->user_rated ?? '' }} <br>
                        {{-- {{ $userRequest->user->comment ?? '' }} <br> --}}
                    </p>
                    <p class="text-gray-600 dark:text-gray-400 md:col-span-1 col-span-2 md:mb-0 mb-3">
                        <span
                            class="font-semibold text-gray-800 dark:text-gray-300 text-base">{{ __('crud.admin.providers.name') ?? '' }}
                            {{ __('crud.general.details') ?? '' }}</span> <br>
                        {{ $userRequest->provider->name ?? '' }} <br>
                        {{ $userRequest->provider->email ?? '' }} <br>
                        {{ $userRequest->provider->mobile ?? '' }} <br>
                        Provider Rating:- {{ $userRequest->provider_rated ?? '' }} <br>
                    </p>
                    <div class="my-3 col-span-3">
                        <p class="mb-4 text-gray-600 dark:text-gray-400">
                            <span class="font-semibold">{{ __('crud.inputs.payment_mode') ?? '' }}</span>:
                            {{ $userRequest->payment_mode ?? '' }}
                        </p>
                        <p class="mb-4 text-gray-600 dark:text-gray-400">
                            <span class="font-semibold">{{ __('crud.inputs.start_time') ?? '' }}</span>:
                            {{ $userRequest->started_at ?? '-' }}
                        </p>
                        <p class="mb-4 text-gray-600 dark:text-gray-400">
                            <span class="font-semibold">{{ __('crud.inputs.end_time') ?? '' }}</span>:
                            {{ $userRequest->finished_at ?? '-' }}
                        </p>
                    </div>
                </div>


                <div class="col-span-1">
                    {{-- Map Goes Here. --}}
                    <img src="https://maps.googleapis.com/maps/api/staticmap?center={{ $userRequest->s_latitude ?? '' }},{{ $userRequest->s_longitude ?? '' }}&zoom=20&size=550x400
                                                    &markers=color:blue|label:S|{{ $userRequest->s_latitude ?? '' }},{{ $userRequest->s_longitude ?? '' }}
                                                    &markers=size:mid|color:0xFFFF00|label:D|{{ $userRequest->d_latitude ?? '' }},{{ $userRequest->d_longitude ?? '' }}&key={{config('constants.map_key')}}"
                        alt="Image Could Not Be Loaded">
                </div>
            </div>

        </div>
    </section>
    <section class="container h-full">
        <div class="w-full px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="text-center px-4 py-3">{{ __('crud.admin.serviceTypes.name') ?? '' }}</th>
                        <th class="text-center px-4 py-3">Source {{ __('crud.general.location') ?? '' }}</th>
                        <th class="text-center px-4 py-3">Destination {{ __('crud.general.location') ?? '' }}</th>
                        {{-- <th class="text-center px-4 py-3">{{ __('crud.payment.base_price') ?? '' }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.payment.discount') ?? '' }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.payment.tax_percent') ?? '' }}</th> --}}
                        {{-- <th class="text-center px-4 py-3">{{ __('crud.general.total') ?? '' }}</th> --}}
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                        {{ $userRequest->serviceType->name ?? '' }}
                    </td>
                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                        {{ $userRequest->s_address ?? '-' }}
                    </td>
                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                        {{ $userRequest->d_address ?? '-' }}
                    </td>
                    {{-- <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{ $userRequest->service->fixed ?? '-' }}
                    </td>
                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                        {{ $userRequest->service-> ?? '-' }}
                    </td>
                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                        {{ $userRequest->service-> ?? '-' }}
                    </td>
                    --}}
                    {{-- <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                        {{ $userRequest->estimated_fare ?? '-' }} --}}
                    </td>
                </tbody>
            </table>
        </div>
    </section>
    @if($userRequest->payment)
        <section class="container h-full ">
            <div class="w-full px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <h2 class="text-3xl mb-2 font-heading font-semibold dark:text-gray-400">{{__('crud.payment.invoice') ?? ''}}
                </h2>
                <div class="flex flex-wrap -mx-4">
                    <div class="w-full lg:w-1/2 px-4 mb-4 lg:mb-0">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr
                                    class="font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">{{ __('crud.admin.invoice.name') ?? '' }}</th>
                                    <th class="px-4 py-3">{{ __('crud.admin.invoice.value') ?? '' }}</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr
                                    class="tracking-wide text-left text-gray-500 dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <td class="border-t px-4 py-2">{{__('crud.payment.payment_mode') ?? ''}}</td>
                                    <td class="border-t px-4 py-2">{{ $userRequest->payment->payment_mode ?? ''}}
                                    </td>
                                </tr>
                                <tr
                                    class="tracking-wide text-left text-gray-500 dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <td class="border-t px-4 py-2">{{__('crud.payment.base_price') ?? ''}}</td>
                                    <td class="border-t px-4 py-2">{{ currency($userRequest->payment->fixed ) ?? ''}}</td>
                                </tr>
                                <tr
                                    class="tracking-wide text-left text-gray-500 dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    @if($userRequest->service_type->calculator=='MIN')
                                        <td class="border-t px-4 py-2">{{__('crud.payment.minutes_price') ?? ''}}</td>
                                        <td class="border-t px-4 py-2">{{ currency($userRequest->payment->minute) ?? '' }}</td>
                                    @endif
                                    @if($userRequest->service_type->calculator=='HOUR')
                                        <td class="border-t px-4 py-2">sf{{__('crud.payment.hours_price') ?? ''}}</td>
                                        <td class="border-t px-4 py-2">{{ currency($userRequest->payment->hour) ?? '' }}</td>
                                    @endif
                                    @if($userRequest->service_type->calculator=='DISTANCE')
                                        <td class="border-t px-4 py-2">{{__('crud.payment.distance_price') ?? ''}}</td>
                                        <td class="border-t px-4 py-2">{{ currency($userRequest->payment->distance) ?? '' }}</td>
                                    @endif
                                    @if($userRequest->service_type->calculator=='DISTANCEMIN')
                                            <td class="border-t px-4 py-2">{{__('crud.payment.minutes_price') ?? ''}}</td>
                                            <td class="border-t px-4 py-2">{{ currency($userRequest->payment->minute) ?? '' }}</td>
                                        </tr>
                                        <tr class="tracking-wide text-left text-gray-500 dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                            <td class="border-t px-4 py-2">{{__('crud.payment.distance_price') ?? ''}}</td>
                                            <td class="border-t px-4 py-2">{{ currency($userRequest->payment->distance) ?? '' }}</td>
                                    @endif
                                    @if($userRequest->service_type->calculator=='DISTANCEHOUR')
                                        <td class="border-t px-4 py-2">{{__('crud.payment.hours_price') ?? ''}}</td>
                                        <td class="border-t px-4 py-2">{{ currency($userRequest->payment->hour) ?? '' }}</td>
                                    </tr>
                                    <tr class="tracking-wide text-left text-gray-500 dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <td class="border-t px-4 py-2">{{__('crud.payment.distance_price') ?? ''}}</td>
                                        <td class="border-t px-4 py-2">{{ currency($userRequest->payment->distance) ?? '' }}</td>
                                    @endif
                                </tr>
                                @if ($userRequest->payment->discount != 0)
                                <tr
                                    class="tracking-wide text-left text-gray-500 dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <td class="border-t px-4 py-2">
                                        {{__('crud.payment.discount') ?? ''}}
                                    </td>
                                    <td class="border-t px-4 py-2">
                                        <span class="mono">- {{ currency($userRequest->payment->discount) ?? '' }}</span>
                                    </td>
                                </tr>
                                @endif
                                <tr
                                    class="tracking-wide text-left text-gray-500 dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <td class="border-t px-4 py-2">
                                        {{__('crud.payment.tax') ?? ''}}
                                    </td>
                                    <td class="border-t px-4 py-2">
                                        <span class="mono">{{ currency($userRequest->payment->tax) ?? '' }}</span>
                                        <small class="text-muted"> / {{Config::get('constants.tax_percentage')}}%</small>
                                    </td>
                                </tr>
                                @if ($userRequest->payment->tips != 0)
                                <tr
                                    class="tracking-wide text-left text-gray-500 dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <td class="border-t px-4 py-2">
                                        {{__('crud.payment.tip') ?? ''}}
                                    </td>
                                    <td class="border-t px-4 py-2">
                                        {{ currency($userRequest->payment->tips) ?? '' }}
                                </tr>
                                @endif

                                <tr
                                    class="tracking-wide text-left text-gray-500 dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <td class="border-t px-4 py-2">
                                        {{__('crud.payment.paid') ?? ''}}
                                    </td>
                                    <td class="border-t px-4 py-2">
                                        <strong class="mono">
                                            {{ currency($userRequest->payment->payable+$userRequest->payment->tips) ?? '' }}</strong>
                                </tr>
                                <tr
                                    class="tracking-wide text-left text-gray-500 dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <td class="border-t px-4 py-2">
                                        {{__('crud.payment.round_off') ?? ''}}
                                    </td>
                                    <td class="border-t px-4 py-2">
                                        {{ currency($userRequest->payment->round_of) ?? '' }}
                                    </td>
                                </tr>

                                <tr
                                    class="tracking-wide text-left text-gray-500 dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <td class="border-t px-4 py-2">
                                        {{__('crud.payment.total') ?? ''}}
                                    </td>
                                    <td class="border-t px-4 py-2">
                                        <strong class="text-muted mono">
                                            {{ currency($userRequest->payment->total+$userRequest->payment->tips) ?? '' }}</strong>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    @if(request()->routeIs(['admin.request.detail']))
                        <div class="w-full lg:w-1/2 px-4 mb-4 lg:mb-0">
                            <table class="w-full whitespace-no-wrap">
                                <thead>
                                    <tr
                                        class="font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th colspan="2" class="px-4 py-3">{{ __('crud.admin.invoice.admin') ?? '' }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        class="tracking-wide text-left text-gray-500 dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <td class="border-t px-4 py-2">{{__('crud.payment.admin_commission') ?? ''}}</td>
                                        <td class="border-t px-4 py-2">{{ currency($userRequest->payment->commision) ?? '' }}
                                            ({{ $userRequest->payment->commision_per ?? '' }}%)</td>
                                    </tr>
                                    {{-- <tr
                                        class="tracking-wide text-left text-gray-500 dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <td class="border-t px-4 py-2">agent Commission</td>
                                        <td class="border-t px-4 py-2">
                                            {{ $userRequest->payment->agent ?? '' }}({{ $userRequest->payment->agent_per ?? '' }}%)
                                    </td>
                                    </tr> --}}
                                    <tr
                                        class="tracking-wide text-left text-gray-500 dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <td class="border-t px-4 py-2">{{__('crud.payment.provider_earning') ?? ''}}</td>
                                        <td class="border-t px-4 py-2">{{ currency($userRequest->payment->provider_pay) ?? '' }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif
@endsection