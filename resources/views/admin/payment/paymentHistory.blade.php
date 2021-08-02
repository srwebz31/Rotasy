@extends('admin.layout.app')

@section('title')
Admin - {{ __('crud.admin.users.name') }} {{ __('crud.navlinks.request') }} {{ __('crud.navlinks.history') }}
@endsection

@section('heading')
{{ __('crud.admin.users.name') }} {{ __('crud.navlinks.request') }} {{ __('crud.navlinks.history') }}
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
                    <th class="text-center px-4 py-3">{{ __('crud.admin.providers.name') }}
                        {{ __('crud.inputs.amount') }}</th>
                    <th class="text-center px-4 py-3">{{ __('crud.inputs.total_amount') }}</th>
                    <th class="text-center px-4 py-3">{{ __('crud.inputs.payment_mode') }}</th>
                    <th class="text-center px-4 py-3">{{ __('crud.inputs.payment_status') }}</th>
                    {{-- <th class="text-center px-4 py-3">{{ __('crud.general.actions') }}</th> --}}
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                {{-- Approved --}}
                @forelse ($paymentLogs as $paymentLog)
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{ $loop->index + 1 }}</td>
                    <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3">
                        {{ $paymentLog->transaction_id }}
                    </td>
                    <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm">
                        {{ currency($paymentLog->amount) ?? ''}}
                    </td>
                    <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm">
                        {{ currency($paymentLog->amount) ?? ''}}
                    </td>
                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3 text-sm">
                        {{ $paymentLog->payment_mode ?? 'INR' }}
                    </td>
                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3 text-sm">
                        {{ $paymentLog->status ?? ''}}
                    </td>
                    {{-- <td>
                                <div class="flex items-center justify-center">
                                    <x-buttons.show :link="route('admin.paymentLog.show', $paymentLog)"></x-buttons.show>
                                    <x-buttons.edit :link="route('admin.paymentLog.edit', $paymentLog)"></x-buttons.edit>
                                    <x-buttons.delete :link="route('admin.paymentLog.destroy', $paymentLog)"></x-buttons.delete>
                                </div>
                            </td> --}}
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
        {!! $paymentLogs->links() !!}
    </div>
</div>
@endsection