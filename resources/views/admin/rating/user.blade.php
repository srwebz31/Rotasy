@extends('admin.layout.app')

@section('title')
    Admin - {{ __('crud.admin.ratings.user') }}
@endsection

@section('heading')
    {{ __('crud.admin.ratings.user') }}
@endsection

@section('content')
    <div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.SNo') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.booking_id') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.commission') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.date') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.status') }}</th>
                        {{-- <th class="text-center px-4 py-3">{{ __('crud.inputs.payment_mode') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.payment_status') }}</th> --}}
                        {{-- <th class="text-center px-4 py-3">{{ __('crud.general.actions') }}</th> --}}
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    {{-- Approved --}}
                    @forelse ($ratings as $rating)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{ $loop->index + 1 }}</td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                <div class="flex items-center text-sm">
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full"
                                        src="{{ $rating->image ? asset('storage/'.$rating->image) : asset('img/avatar.png') }}" alt="" loading="lazy" />
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-700 dark:text-gray-400">{{ $rating->name }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm">
                                <p class="font-semibold text-gray-700 dark:text-gray-400">{{ Str::limit($rating->description, 100) }}</p>
                            </td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm">
                                <x-show-status :status="$rating->status"></x-show-status>
                            </td>
                            <td>
                                <div class="flex items-center justify-center">
                                    {{-- <x-buttons.show :link="route('admin.admin.show', $rating)"></x-buttons.show> --}}
                                    {{-- <x-buttons.edit :link="route('admin.rating.edit', $rating)"></x-buttons.edit>
                                    <x-buttons.delete :link="route('admin.rating.destroy', $rating)"></x-buttons.delete> --}}
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
        {{-- <div class="">
            {!! $ratings->links() !!}
        </div> --}}
    </div>
@endsection