@extends('admin.layout.app')

@section('title')
Admin - {{ __('crud.admin.settlements.all_transactions') }}
@endsection

@section('heading')
{{ __('crud.admin.settlements.all_transactions') }}
@endsection

@section('content')
<div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="text-center px-4 py-3">{{ __('crud.inputs.SNo') }}</th>
                    <th class="text-center px-4 py-3">{{ __('crud.inputs.transaction_id') }}</th>
                    <th class="text-center px-4 py-3">{{ __('crud.inputs.amount') }}</th>
                    <th class="text-center px-4 py-3">{{ __('crud.inputs.description') }}</th>
                    <th class="text-center px-4 py-3">{{ __('crud.payment.transaction_type') }}</th>
                    <th class="text-center px-4 py-3">{{ __('crud.inputs.date') }} & {{ __('crud.inputs.time') }}</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                {{-- Approved --}}
                @forelse ($paymentLogs as $paymentLog)
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{ $loop->index + 1 }}</td>
                    <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-center">
                        {{ $paymentLog->transaction_alias }}
                    </td>
                    <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                        {{ currency($paymentLog->amount) ?? ''}}
                    </td>
                    <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                        {{ $paymentLog->transaction_desc ?? '-'}}
                    </td>
                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3 text-sm">
                        {{ $paymentLog->type == 'C' ? 'Credit' : 'Debit' }}
                    </td>
                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3 text-sm">
                        {{ $paymentLog->created_at ? $paymentLog->created_at->toDate()->format('d/m/Y') : '' }}
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
        <p class="mt-3 dark:text-red-500">{{config('constants.booking_prefix', '') }} - Ride Transactions, PSET - Driver Transaction, FSET - Fleet Transaction, URC - User Refills</p>
    </div>
    {{-- Pagination --}}
    <div class="">
        {!! $paymentLogs->links() !!}
    </div>
</div>
@endsection