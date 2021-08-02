@extends('admin.layout.app')

@section('title')
    Admin - {{ __('crud.admin.peakHours.index') }}
@endsection

@section('heading')
    {{ __('crud.admin.peakHours.index') }}
@endsection

@section('content')
    <x-indexPageSearch :addBtnRoute="route('admin.peakHour.create')" :addBtnText="__('crud.admin.peakHours.create')"></x-indexPageSearch>
    <div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.SNo') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.start_time') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.end_time') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.general.actions') }}</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    {{-- Approved --}}
                    @forelse ($peakHours as $peakHour)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{ $loop->index + 1 }}</td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                {{ $peakHour->start_time }}
                            </td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                {{ $peakHour->end_time }}
                            </td>
                            <td>
                                <div class="flex items-center justify-center">
                                    {{-- <x-buttons.show :link="route('admin.admin.show', $peakHour)"></x-buttons.show> --}}
                                    <x-buttons.edit :link="route('admin.peakHour.edit', $peakHour)"></x-buttons.edit>
                                    <x-buttons.delete :link="route('admin.peakHour.destroy', $peakHour)"></x-buttons.delete>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 py-3 text-sm dark:text-gray-400" colspan="6">
                                @lang('crud.general.not_found')
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{-- Pagination --}}
        <div class="">
            {!! $peakHours->links() !!}
        </div>
    </div>
@endsection