@extends('agent.layout.app')

@section('title', 'Request History')

@section('heading', 'Request History')

@section('content')
    <div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap" id="table-2">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="text-center px-4 py-3">@lang('admin.request.Booking_ID')</th>
                        <th class="text-center px-4 py-3">@lang('admin.request.User_Name')</th>
                        <th class="text-center px-4 py-3">@lang('admin.request.Provider_Name')</th>
                        <th class="text-center px-4 py-3">@lang('admin.request.Date_Time')</th>
                        <th class="text-center px-4 py-3">@lang('crud.inputs.status')</th>
                        <th class="text-center px-4 py-3">@lang('crud.inputs.amount')</th>
                        <th class="text-center px-4 py-3">@lang('admin.request.Payment_Mode')</th>
                        <th class="text-center px-4 py-3">@lang('admin.request.Payment_Status')</th>
                        <th class="text-center px-4 py-3">@lang('crud.general.actions')</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @if(count($requests) != 0)
                        @foreach($requests as $index => $request)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{ $request->booking_id }}</td>
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{ $request->user->first_name }} {{ $request->user->last_name }}</td>
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    @if($request->provider)
                                        {{ $request->provider->first_name }} {{ $request->provider->last_name }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{$request->created_at->diffForHumans()}}</td>
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    @if($request->status == "COMPLETED")
                                        <span class="tag tag-success">Completed</span>
                                    @elseif($request->status == "CANCELLED")
                                        <span class="tag tag-danger">Cancelled</span>
                                    @elseif($request->status == "ARRIVED")
                                        <span class="tag tag-info">Arrived</span>
                                    @elseif($request->status == "SEARCHING")
                                        <span class="tag tag-info">Searching</span>
                                    @elseif($request->status == "ACCEPTED")
                                        <span class="tag tag-info">Accepted</span>
                                    @elseif($request->status == "STARTED")
                                        <span class="tag tag-info">Started</span>
                                    @elseif($request->status == "DROPPED")
                                        <span class="tag tag-info">Dropped</span>
                                    @elseif($request->status == "PICKEDUP")
                                        <span class="tag tag-info">Pickup</span>
                                    @elseif($request->status == "SCHEDULED")
                                        <span class="tag tag-info">Scheduled</span>
                                    @endif
                                </td>
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    @if($request->payment != "")
                                        {{ currency($request->payment->total) }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    @if($request->payment_mode == "CASH")
                                        Cash
                                    @elseif($request->payment_mode == "DEBIT_MACHINE")
                                        Debit Machine
                                    @elseif($request->payment_mode == "VOUCHER")
                                        Voucher
                                    @elseif($request->payment_mode == "CARD")
                                        Card
                                    @else
                                        {{ $request->payment_mode }}
                                    @endif
                                </td>
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    @if($request->paid)
                                        Paid
                                    @else
                                        Payment Pending
                                    @endif
                                </td>
                                <td>
                                    <div class="flex items-center justify-center">
                                        <x-buttons.show :link="route('agent.requests.show', $request->id)"></x-buttons.show>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="text-gray-700 dark:text-gray-400 text-sm">
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3" colspan="10">No results found</td>
                        </tr>
                    @endif 
                </tbody>
            </table>
        </div>
    </div>
@endsection