@extends('admin.layout.app')

@section('title')
    Admin - {{ __('crud.admin.notifications.index') }}
@endsection

@section('heading')
    {{ __('crud.admin.notifications.index') }}
@endsection

@section('content')
    <x-indexPageSearch :addBtnRoute="route('admin.notification.create')" :addBtnText="__('crud.admin.notifications.create')"></x-indexPageSearch>
    <div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.SNo') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.name') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.for') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.expiry_date') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.status') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.general.actions') }}</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    {{-- Approved --}}
                    @forelse ($notifications as $notification)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{ $loop->index + 1 }}</td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img
                                        class="object-cover w-full h-full rounded-full"
                                        src="{{ $notification->image ? asset('storage/'.$notification->image) : "https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ" }}"
                                        alt=""
                                        loading="lazy"
                                        />
                                        <div class="absolute inset-0 rounded-full shadow-inner"
                                        aria-hidden="true"></div>
                                    </div>
                                    <div>
                                        <p>{{ $notification->description }}</p>
                                        {{-- <p class="text-xs text-gray-600 dark:text-gray-400">
                                        10x Developer
                                        </p> --}}
                                    </div>
                                </div>
                            </td>
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3 text-sm capitalize">
                                {{ $notification->notify_type ?? "-" }}
                            </td>
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3 text-sm capitalize">
                                {{ $notification->expiry_date ?? "-" }}
                            </td>
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3 text-sm">
                                <x-show-status :status="$notification->status"></x-show-status>
                            </td>
                            <td>
                                <div class="flex items-center justify-center">
                                    {{-- <x-buttons.show :link="route('admin.user.show', $notification)"></x-buttons.show> --}}
                                    <x-buttons.edit :link="route('admin.notification.edit', $notification)"></x-buttons.edit>
                                    <x-buttons.delete :link="route('admin.notification.destroy', $notification)"></x-buttons.delete>
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
            {!! $notifications->links() !!}
        </div>
    </div>
@endsection