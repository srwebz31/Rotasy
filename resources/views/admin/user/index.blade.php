@extends('admin.layout.app')

@section('title')
Admin - {{ __('crud.admin.users.index') }}
@endsection

@section('heading')
{{ __('crud.admin.users.index') }}
@endsection

@section('content')
<x-indexPageSearch :addBtnRoute="route('admin.user.create')" :addBtnText="__('crud.admin.users.create')">
</x-indexPageSearch>
<div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="text-center px-4 py-3">{{ __('crud.inputs.SNo') }}</th>
                    <th class="text-center px-4 py-3">{{ __('crud.admin.users.name') }} {{ __('crud.general.id') }}</th>
                    <th class="text-center px-4 py-3">{{ __('crud.inputs.name') }}</th>
                    <th class="text-center px-4 py-3">{{ __('crud.inputs.email') }}</th>
                    <th class="text-center px-4 py-3">{{ __('crud.inputs.phone') }}</th>
                    <th class="text-center px-4 py-3">{{ __('crud.general.wallet') }}</th>
                    <th class="text-center px-4 py-3">{{ __('crud.general.user') }} {{ __('crud.navlinks.request') }}
                    </th>
                    <th class="text-center px-4 py-3">{{ __('crud.general.actions') }}</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                {{-- Approved --}}
                @forelse ($users as $user)
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{ $loop->index + 1 }}</td>
                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{ $user->id }}</td>
                    <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3">
                        <div class="flex items-center text-sm">
                            <!-- Avatar with inset shadow -->
                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                <img class="object-cover w-full h-full rounded-full"
                                    src="{{ $user->avatar ? asset('storage/'.$user->avatar) : "https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ" }}"
                                    alt="" loading="lazy" />
                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-700 dark:text-gray-400">{{ $user->name }}</p>
                                {{-- <p class="text-xs text-gray-600 dark:text-gray-400">
                                        10x Developer
                                        </p> --}}
                            </div>
                        </div>
                    </td>
                    <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm">
                        {{ $user->email ?? ''}}
                    </td>
                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3 text-sm">
                        {{ $user->country_code ? $user->country_code.'-' : '' }}{{ $user->mobile ?? ''}}
                    </td>
                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3 text-sm">
                        {{ currency($user->wallet_balance) ?? ''}}
                    </td>
                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3 text-sm">
                        {{ $user->userRequest->count() }}
                    </td>
                    <td>
                        <div class="flex items-center justify-center">
                            {{-- <x-buttons.show :link="route('admin.user.show', $user)"></x-buttons.show> --}}
                            <x-buttons.edit :link="route('admin.user.edit', $user)"></x-buttons.edit>
                            <x-buttons.delete :link="route('admin.user.destroy', $user)"></x-buttons.delete>
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
        {!! $users->links() !!}
    </div>
</div>
@endsection