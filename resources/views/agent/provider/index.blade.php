@extends('agent.layout.app')

@section('title')
    Admin - {{ __('crud.admin.providers.index') }}
@endsection

@section('heading')
    {{ __('crud.admin.providers.index') }}
@endsection

@section('content')
    <x-indexPageSearch :addBtnRoute="route('agent.provider.create')" :addBtnText="__('crud.admin.providers.create')"></x-indexPageSearch>
    <div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.SNo') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.admin.providers.name') }} {{ __('crud.general.id') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.name') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.email') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.phone') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.admin.documents.name') }} {{ __('crud.inputs.status') }}</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    {{-- Approved --}}
                    @forelse ($providers as $provider)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{ $loop->index + 1 }}</td>
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{ $provider->id }}</td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img
                                        class="object-cover w-full h-full rounded-full"
                                        src="{{ $provider->avatar ? asset('storage/'.$provider->avatar) : "https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ" }}"
                                        alt=""
                                        loading="lazy"
                                        />
                                        <div class="absolute inset-0 rounded-full shadow-inner"
                                        aria-hidden="true"></div>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-700 dark:text-gray-400">{{ $provider->name }}</p>
                                        {{-- <p class="text-xs text-gray-600 dark:text-gray-400">
                                        10x Developer
                                        </p> --}}
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm">
                                {{ $provider->email ?? '' }}
                            </td>
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3 text-sm">
                                {{ $provider->mobile }}
                            </td>
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3 text-sm">
                                @if($provider->status == 'document')
                                    <span class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:text-white dark:bg-yellow-600">{{ $provider->pendingDocuments ? "Documents Verification Pending" : "Documents Required" }}</span>
                                @elseif($provider->status == 'banned')
                                    <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">Bloked</span>
                                @elseif($provider->status == 'approved')
                                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">Approved</span>
                                @endif
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
            {!! $providers->links() !!}
        </div>
    </div>
@endsection