@extends('agent.layout.app')

@section('title', __('crud.admin.ratings.provider'))

@section('heading')
    {{ __('crud.admin.ratings.provider') }}
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
                        <th class="text-center px-4 py-3">{{ __('crud.navlinks.request') }} {{ __('crud.general.id') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.admin.serviceTypes.name') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.admin.ratings.user') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.admin.ratings.user_comment') }}</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    {{-- Approved --}}
                    @forelse ($ratings as $rating)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{ $loop->index + 1 }}</td>
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                {{ $rating->user->name ?? '-' }}
                            </td>
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                {{ $rating->provider->name ?? '-' }}
                            </td>
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3 underline">
                                <a href="{{ route('agent.requests.show', $rating->request_id) }}">
                                    {{ $rating->request_id ?? '-' }}
                                </a>
                            </td>
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                {{ $rating->request->serviceType->name ?? '-' }}
                            </td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                {{ $rating->user_rating ?? '-' }}
                            </td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                <p class="font-semibold text-gray-700 dark:text-gray-400">{{ $rating->user_comment }}</p>
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
            {!! $ratings->links() !!}
        </div>
    </div>
@endsection