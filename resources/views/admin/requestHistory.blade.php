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
                    <th class="text-center px-4 py-3">{{ __('crud.inputs.booking_id') }}</th>
                    <th class="text-center px-4 py-3">{{ __('crud.admin.users.name') }}</th>
                    <th class="text-center px-4 py-3">{{ __('crud.admin.providers.name') }}</th>
                    <th class="text-center px-4 py-3">{{ __('crud.admin.serviceTypes.name') }}</th>
                    <th class="text-center px-4 py-3">{{ __('crud.inputs.amount') }}</th>
                    <th class="text-center px-4 py-3">{{ __('crud.inputs.status') }}</th>
                    <th class="text-center px-4 py-3">{{ __('crud.general.actions') }}</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                {{-- Approved --}}
                @forelse ($userRequests as $userRequest)
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{ $loop->index + 1 }}</td>
                    <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3">
                        {{ $userRequest->booking_id }}
                    </td>
                    <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm">
                        {{ $userRequest->user->name ?? ''}}
                    </td>
                    <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm">
                        {{ $userRequest->provider->name ?? ''}}
                    </td>
                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3 text-sm">
                        {{ $userRequest->serviceType->name ?? 'INR' }}
                    </td>
                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3 text-sm">
                        {{ currency($userRequest->payment->total ?? 0) ?? '-' }}
                    </td>
                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3 text-sm">
                        <x-request-show-status :status="$userRequest->status"></x-request-show-status>
                    </td>
                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3 text-sm">
                        <x-buttons.show :link="route('admin.request.detail', $userRequest)"></x-buttons.show>
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
        {!! $userRequests->links() !!}
    </div>
</div>
@endsection