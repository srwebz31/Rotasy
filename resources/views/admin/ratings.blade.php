@extends('admin.layout.app')

@section('title')
    Admin - {{ __('crud.admin.ratings.name') }}
@endsection

@section('heading')
    {{ __('crud.admin.ratings.name') }}
@endsection

@section('content')
    <div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.SNo') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.admin.users.name') }} {{ __('crud.inputs.name') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.admin.providers.name') }} {{ __('crud.inputs.name') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.admin.ratings.user') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.admin.ratings.user_comment') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.admin.ratings.provider') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.admin.ratings.provider_comment') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.date') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.general.actions') }}</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    {{-- Approved --}}
                    @forelse ($ratings as $rating)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{ $loop->index + 1 }}</td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                {{ $rating->user->name ?? '' }}
                            </td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                {{ $rating->provider->name ?? '' }}
                            </td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                {{ $rating->user_rating }}
                            </td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                {{ $rating->user_comment ?? '-' }}
                            </td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                {{ $rating->provider_rating }}
                            </td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                {{ $rating->provider_comment ?? '-'  }}
                            </td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                {{ $rating->created_at->toDate()->format('d/m/Y') }}
                            </td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                <x-buttons.show :link="route('admin.request.detail', $rating->request_id)"></x-buttons.show>
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