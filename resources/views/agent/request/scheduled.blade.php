@extends('agent.layout.app')

@section('title', 'Scheduled Rides ')

@section('heading', 'Scheduled Rides ')

@section('content')
    <div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap" id="table-2">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="text-center px-4 py-3">@lang('admin.id')</th>
                        <th class="text-center px-4 py-3">@lang('admin.request.Request_Id')</th>
                        <th class="text-center px-4 py-3">@lang('admin.request.User_Name')</th>
                        <th class="text-center px-4 py-3">@lang('admin.request.Provider_Name')</th>
                        <th class="text-center px-4 py-3">@lang('admin.request.Scheduled_Date_Time')</th>
                        <th class="text-center px-4 py-3">@lang('admin.status')</th>
                        <th class="text-center px-4 py-3">@lang('admin.request.Payment_Mode')</th>
                        <th class="text-center px-4 py-3">@lang('admin.request.Payment_Status')</th>
                        <th class="text-center px-4 py-3">@lang('admin.action')</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @if(count($requests) != 0)
                        @foreach($requests as $index => $request)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{$index + 1}}</td>

                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{$request->booking_id}}</td>
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{$request->user->first_name}} {{$request->user->last_name}}</td>
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    @if($request->provider_id)
                                        {{$request->provider->first_name}} {{$request->provider->last_name}}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{$request->schedule_at}}</td>
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    {{$request->status}}
                                </td>

                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{$request->payment_mode}}</td>
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    @if($request->paid)
                                        Paid
                                    @else
                                        Not Paid
                                    @endif
                                </td>
                                <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                    <div class="input-group-btn">
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Action
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('fleet.requests.show', $request->id) }}" class="btn btn-default"><i class="fa fa-search"></i> More Details</a>
                                        </li>
                                    </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="text-sm text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3" colspan="10">No Scheduled Rides Found</td>
                        </tr>
                    @endif
                </tbody>
            </table>

        </div>
    </div>
@endsection
