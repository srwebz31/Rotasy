@extends('admin.layout.app')

@section('title')
    Admin - {{ __('crud.admin.documents.index') }}
@endsection

@section('heading')
    {{ __('crud.admin.documents.index') }}
@endsection

@section('content')
    <x-indexPageSearch :addBtnRoute="route('admin.document.create')" :addBtnText="__('crud.admin.documents.create')"></x-indexPageSearch>
    <div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.SNo') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.name') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.type') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.status') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.general.actions') }}</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    {{-- Approved --}}
                    @forelse ($documents as $document)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{ $loop->index + 1 }}</td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3">
                                <div class="flex items-center text-sm">
                                    <p class="font-semibold text-gray-700 dark:text-gray-400">{{ $document->name }}</p>
                                </div>
                            </td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                {{ $document->type ?? '-'}}
                            </td>
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3 text-sm">
                                <x-show-status :status="$document->status"></x-show-status>
                            </td>
                            <td>
                                <div class="flex items-center justify-center">
                                    <x-buttons.edit :link="route('admin.document.edit', $document)"></x-buttons.edit>
                                    <x-buttons.delete :link="route('admin.document.destroy', $document)"></x-buttons.delete>
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
            {!! $documents->links() !!}
        </div>
    </div>
@endsection