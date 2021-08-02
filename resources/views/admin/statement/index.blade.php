@extends('admin.layout.app')

@section('title')
Admin - {{ __('crud.admin.statements.overall') }}
@endsection

@section('heading')
{{ __('crud.admin.statements.overall') }}
@endsection

@section('content')

<div class="relative flex-wrap -mb-4 md:mb-0">
    <form action="{{ route('admin.statement.overall') }}" method="get">
        <div class="flex text-gray-500 items-center">
            {{-- USE REQUEST VARIABLES TO SET OLD VALUES HERE. --}}
            <x-inputs.date input-group name="start_date" space="md:w-1/3" id="datepicker"
                :label="__('crud.inputs.start_date')"
                :value="old('start_date', request()->has('start_date') ? request()->get('start_date') : '')" :num="2">
            </x-inputs.date>

            <x-inputs.date input-group name="end_date" space="md:w-1/3" id="datepicker"
                :label="__('crud.inputs.end_date')"
                :value="old('end_date', request()->has('end_date') ? request()->get('end_date') : '')">
            </x-inputs.date>

            <x-inputs.select :label="__('crud.inputs.status')" name="status" space="md:w-1/3">
                <option
                    {{ old('status', request()->has('status') ? request()->get('status') : '') == "ALL" ? "selected" : "ALL" }}
                    value="ALL">ALL
                </option>
                <option
                    {{ old('status', request()->has('status') ? request()->get('status') : '') == "ACCEPTED" ? "selected" : "ACCEPTED" }}
                    value="ACCEPTED">Accepted
                </option>
                <option
                    {{ old('status', request()->has('status') ? request()->get('status') : '') == "CANCELLED" ? "selected" : "CANCELLED" }}
                    value="CANCELLED">Cancelled
                </option>
                <option
                    {{ old('status', request()->has('status') ? request()->get('status') : '') == "COMPLETED" ? "selected" : "COMPLETED" }}
                    value="COMPLETED">Completed
                </option>
            </x-inputs.select>
        </div>
        <div class="flex text-gray-500 mb-5 justify-end px-4">
            <button type="submit"
                class="mr-1 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                <i class="fa fa-search"></i> {{ __('crud.general.search') }}
            </button>
            <a href="{{ route('admin.statement.overall') }}"
                class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                <i class="fa fa-times"></i> {{ __('crud.general.clear') }} {{ __('crud.general.filter') }}
            </a>
        </div>
    </form>
</div>
<div class="grid gap-6 mb-0 md:grid-cols-2 xl:grid-cols-4">
    <!-- Card -->
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="w-20 flex justify-center items-center h-20 mr-4 text-purple-500 text- bg-purple-100 rounded-full dark:text-purple-100 dark:bg-purple-500">
            <i class="fa p-2 fa-2x fa-briefcase"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Total Jobs
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ $total_jobs }}
            </p>
        </div>
    </div>
    <!-- Card -->
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="w-20 flex justify-center items-center h-20 mr-4 text-green-500 text- bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
            <i class="fa p-2 fa-2x fa-usd"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Total Revenue Generated
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ currency($revenue) }}
                <br>
                <span class="text-xs">in {{ $total_jobs - $cancelled_jobs }} Trips</span>
            </p>
        </div>
    </div>
    <!-- Card -->
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="w-20 flex justify-center items-center h-20 mr-4 text-red-500 text- bg-red-100 rounded-full dark:text-red-100 dark:bg-red-500">
            <i class="fa p-2 fa-2x fa-times"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Cancelled Rides
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ $cancelled_jobs }}
            </p>
        </div>
    </div>
    <!-- Card -->
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="w-20 flex justify-center items-center h-20 mr-4 text-blue-500 text- bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
            <i class="fa p-2 fa-2x fa-percent"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Overall Agent Commission
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ currency($overall_agent_commission) }}
            </p>
        </div>
    </div>
    <!-- Card -->
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="w-20 flex justify-center items-center h-20 mr-4 text-indigo-500 text- bg-indigo-100 rounded-full dark:text-indigo-100 dark:bg-indigo-500">
            <i class="fa p-2 fa-2x fa-percent"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Overall Admin Commission
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ currency($overall_commission) }}
            </p>
        </div>
    </div>
</div>
<div class="w-full overflow-hidden rounded-lg shadow-xs my-6">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="text-center px-4 py-3">{{ __('crud.inputs.SNo') }}</th>
                    <th class="text-center px-4 py-3">{{ __('crud.inputs.booking_id') }}</th>
                    <th class="text-center px-4 py-3">{{ __('crud.admin.users.name') }}
                        {{ __('crud.general.location') }}</th>
                    <th class="text-center px-4 py-3">{{ __('crud.inputs.commission') }}</th>
                    <th class="text-center px-4 py-3">{{ __('crud.inputs.date') }}</th>
                    <th class="text-center px-4 py-3">{{ __('crud.inputs.status') }}</th>
                    <th class="text-center px-4 py-3">{{ __('crud.inputs.payment_mode') }}</th>
                    <th class="text-center px-4 py-3">{{ __('crud.inputs.payment_status') }}</th>
                    <th class="text-center px-4 py-3">{{ __('crud.general.actions') }}</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                {{-- Approved --}}
                @forelse ($statements as $statement)
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{ $loop->index + 1 }}</td>
                    <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                        {{ $statement->booking_id }}
                    </td>
                    <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                        {{ $statement->d_address ?? '-' }}
                    </td>
                    <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                        {{ currency($statement->payment->commision ?? 0)}}
                    </td>
                    <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                        {{ ($statement->created_at) ? $statement->created_at->toDate()->format('d/m/Y') : '-' }}
                    </td>
                    <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                        <x-request-show-status :status="$statement->status"></x-request-show-status>
                    </td>
                    <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                        {{ $statement->payment_mode }}
                    </td>
                    <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                        {{ $statement->paid ? 'Payment Done' : 'Payment Pending' }}
                    </td>
                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3 text-sm">
                        <x-buttons.show :link="route('admin.request.detail', $statement)"></x-buttons.show>
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
    <div class="">
        {!! $statements->links() !!}
    </div>
</div>
@endsection