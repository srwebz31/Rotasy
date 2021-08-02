@extends('admin.layout.app')

@section('title')
    Admin - {{ __('crud.admin.settlements.name') }}
@endsection

@section('heading')
    {{ __('crud.admin.settlements.name') }}
@endsection

@section('content')
    <div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.SNo') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.general.user') }} {{ __('crud.inputs.type') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.general.user') }} {{ __('crud.inputs.name') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.general.user') }} {{ __('crud.inputs.email') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.type') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.mode') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.amount') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.date') }} & {{ __('crud.inputs.time') }}</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    {{-- Approved --}}
                    @forelse ($settlements as $settlement)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{ $loop->index + 1 }}</td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-center">
                                {{ substr($settlement->request_from, 11) }}
                            </td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                {{ $settlement->walletRequester->name ?? ''}}
                            </td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                {{ $settlement->walletRequester->email ?? ''}}
                            </td>
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3 text-sm">
                                {{ $settlement->type == 'C' ? 'Credit' : 'Debit'}}
                            </td>
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3 text-sm">
                                {{ $settlement->send_by ? ucfirst($settlement->send_by) : '' }}
                            </td>
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3 text-sm">
                                {{ $settlement->amount ?? '-' }}
                            </td>
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3 text-sm">
                                {{ $settlement->created_at->toDate()->format('d-m-Y') ?? '' }}
                            </td>
                            {{-- <td>
                                <div class="flex items-center justify-center">
                                    <x-buttons.show :link="route('admin.settlement.show', $settlement)"></x-buttons.show>
                                    <x-buttons.edit :link="route('admin.settlement.edit', $settlement)"></x-buttons.edit>
                                    <x-buttons.delete :link="route('admin.settlement.destroy', $settlement)"></x-buttons.delete>
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
            {!! $settlements->links() !!}
        </div>
    </div>
@endsection