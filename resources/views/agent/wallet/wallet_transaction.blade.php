@extends('agent.layout.app')

@section('title', 'Agent Wallet Transactions')

@section('heading', "Transações da carteira da frota (" . __('provider.current_balance') . " : " . currency($wallet_balance).")")

@section('content')
<div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="text-center px-4 py-3">@lang('provider.sno')</th>
                    <th class="text-center px-4 py-3">@lang('provider.transaction_ref')</th>
                    <th class="text-center px-4 py-3">@lang('provider.datetime')</th>
                    <th class="text-center px-4 py-3">@lang('provider.transaction_desc')</th>
                    <th class="text-center px-4 py-3">@lang('provider.status')</th>
                    <th class="text-center px-4 py-3">@lang('provider.amount')</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @php($page = ($pagination->currentPage-1)*$pagination->perPage)
                    @foreach($wallet_transaction as $index => $wallet)
                    @php($page++)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{$page}}</td>
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{$wallet->transaction_alias}}</td>
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{$wallet->created_at->diffForHumans()}}</td>
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{$wallet->transaction_desc}}</td>
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{$wallet->type == 'C' ? 'Credit' : 'Debit'}}</td>
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{currency($wallet->amount)}}</td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
    {{-- Pagination --}}
    <div class="">
        {!! $wallet_transaction->links() !!}
    </div>
</div>
@endsection



