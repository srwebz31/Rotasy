@extends('admin.layout.app')

@section('title')
    Admin - {{ __('crud.admin.disputes.name') }}
@endsection

@section('heading')
    {{ __('crud.admin.disputes.name') }}
@endsection

@section('content')
    <x-indexPageSearch :addBtnText="__('crud.admin.disputes.type.create')" :showCreate="1==2"></x-indexPageSearch>
    <div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.SNo') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.admin.disputes.title') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.from') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.admin.users.name').' '.__('crud.inputs.name') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.admin.providers.name').' '.__('crud.inputs.name') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.message') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.status') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.general.actions') }}</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    {{-- Approved --}}
                    @forelse ($disputes as $dispute)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{ $loop->index + 1 }}</td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                {{ $dispute->dispute_name ?? "" }}
                            </td>
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3 text-sm capitalize">
                                {{ $dispute->dispute_type ?? "-" }}
                            </td>
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3 text-sm">
                                {{ $dispute->user ? $dispute->user->name : '' }}
                            </td>
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3 text-sm">
                                {{ $dispute->provider ? $dispute->provider->name : '' }}
                            </td>
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3 text-sm">
                                {{ $dispute->description ? Str::limit($dispute->comments, 50) : '-' }}
                            </td>
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3 text-sm">
                                @if ($dispute->status == "closed")
                                    <span class="px-2 py-1 font-semibold leading-tight text-green-600 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100 text-xs">
                                        Resolved
                                    </span>
                                @else
                                    <span class="px-2 py-1 font-semibold leading-tight text-red-600 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700 text-xs">
                                        Active
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div class="flex items-center justify-center">
                                    <x-buttons.edit :link="route('admin.dispute.edit', $dispute)"></x-buttons.edit>
                                </div>
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
            {!! $disputes->links() !!}
        </div>
    </div>
@endsection