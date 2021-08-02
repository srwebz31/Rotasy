@section('content')
    <div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap w-1/2">
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="dark:text-gray-400 dark:bg-gray-800 px-4 py-3 font-semibold"> {{ __('crud.inputs.booking_id') }} {{ __('crud.inputs.name') }} </td>
                        <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm">
                            {{ $userRequest->booking_id ?? '-'  }}
                        </td>
                    </tr>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="dark:text-gray-400 dark:bg-gray-800 px-4 py-3 font-semibold"> {{ __('crud.general.user') }} {{ __('crud.inputs.name') }} </td>
                        <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm">
                            {{ $userRequest->user->name ?? '-'  }}
                        </td>
                    </tr>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="dark:text-gray-400 dark:bg-gray-800 px-4 py-3 font-semibold"> {{ __('crud.general.provider') }} {{ __('crud.inputs.name') }} </td>
                        <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm">
                            {{ $userRequest->provider->name ?? '-'  }}
                        </td>
                    </tr>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="dark:text-gray-400 dark:bg-gray-800 px-4 py-3 font-semibold"> {{ __('crud.admin.serviceTypes.name') }} {{ __('crud.inputs.name') }} </td>
                        <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm">
                            {{ $userRequest->serviceType->name ?? '-' }}
                        </td>
                    </tr>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="dark:text-gray-400 dark:bg-gray-800 px-4 py-3 font-semibold"> {{ __('crud.admin.geoFencings.name') }} {{ __('crud.inputs.name') }} </td>
                        <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm">
                            {{ $userRequest->geoFence->name ?? '-' }}
                        </td>
                    </tr>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="dark:text-gray-400 dark:bg-gray-800 px-4 py-3 font-semibold"> {{ __('crud.inputs.status') }} </td>
                        <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm">
                            {{ ucfirst(strtolower($userRequest->status)) ?? '-' }}
                        </td>
                    </tr>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="dark:text-gray-400 dark:bg-gray-800 px-4 py-3 font-semibold"> {{ __('crud.dispatcher.pickup_location') }} </td>
                        <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm">
                            {{ $userRequest->s_address ?? '-' }}
                        </td>
                    </tr>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="dark:text-gray-400 dark:bg-gray-800 px-4 py-3 font-semibold"> {{ __('crud.dispatcher.pickup_coordinates') }} </td>
                        <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm">
                            lat: {{ $userRequest->s_latitude ?? '-' }}, lng: {{ $userRequest->s_longitude ?? '-' }}, 
                        </td>
                    </tr>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="dark:text-gray-400 dark:bg-gray-800 px-4 py-3 font-semibold"> {{ __('crud.dispatcher.drop_location') }} </td>
                        <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm">
                            {{ $userRequest->d_address ?? '-' }}
                        </td>
                    </tr>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="dark:text-gray-400 dark:bg-gray-800 px-4 py-3 font-semibold"> {{ __('crud.dispatcher.drop_coordinates') }} </td>
                        <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm">
                            lat: {{ $userRequest->d_latitude ?? '-' }}, lng: {{ $userRequest->d_longitude ?? '-' }}, 
                        </td>
                    </tr>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="dark:text-gray-400 dark:bg-gray-800 px-4 py-3 font-semibold"> {{ __('crud.inputs.distance') }} </td>
                        <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm">
                            {{ $userRequest->distance ?? '-' }} {{ $userRequest->unit ?? '' }}
                        </td>
                    </tr>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="dark:text-gray-400 dark:bg-gray-800 px-4 py-3 font-semibold"> {{ __('crud.admin.userRequests.estimated_fare') }} </td>
                        <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm">
                            {{ $userRequest->estimated_fare ?? '-' }}
                        </td>
                    </tr>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="dark:text-gray-400 dark:bg-gray-800 px-4 py-3 font-semibold"> {{ __('crud.inputs.payment_mode') }} </td>
                        <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm">
                            {{ $userRequest->payment_mode ?? '-' }}
                        </td>
                    </tr>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="dark:text-gray-400 dark:bg-gray-800 px-4 py-3 font-semibold"> {{ __('crud.admin.ratings.user') }} </td>
                        <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm">
                            {{ $userRequest->user_rated ?? '-' }}
                        </td>
                    </tr>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="dark:text-gray-400 dark:bg-gray-800 px-4 py-3 font-semibold"> {{ __('crud.admin.ratings.provider') }} </td>
                        <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm">
                            {{ $userRequest->provider_rated ?? '-' }}
                        </td>
                    </tr>
                    @if($userRequest->cancelled_by != "NONE")
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="dark:text-gray-400 dark:bg-gray-800 px-4 py-3 font-semibold"> Cancelled By </td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm">
                                {{ $userRequest->cancelled_by ?? '-' }}
                            </td>
                        </tr>
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="dark:text-gray-400 dark:bg-gray-800 px-4 py-3 font-semibold"> Cancelled Reason </td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm">
                                {{ $userRequest->cancelled_reason ?? '-' }}
                            </td>
                        </tr>
                    @endif
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="dark:text-gray-400 dark:bg-gray-800 px-4 py-3 font-semibold"> {{ __('crud.inputs.payment_status') }} </td>
                        <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm">
                            {{ $userRequest->payment_status ? 'Payment Done' : 'Pending' }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection