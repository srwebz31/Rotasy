@extends('admin.layout.app')

@section('title')
    Admin - {{ __('crud.admin.faqs.index') }}
@endsection

@section('heading')
    {{ __('crud.admin.faqs.index') }}
@endsection

@section('content')
    <x-indexPageSearch :addBtnRoute="route('admin.faq.create')" :addBtnText="__('crud.admin.faqs.create')"></x-indexPageSearch>
    <div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.SNo') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.question') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.answer') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.general.actions') }}</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    {{-- Approved --}}
                    @forelse ($faqs as $faq)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{ $loop->index + 1 }}</td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                <p class="font-semibold text-gray-700 dark:text-gray-400">{{ Str::limit($faq->question, 50) }}</p>
                            </td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                <p class="font-semibold text-gray-700 dark:text-gray-400">{{ Str::limit($faq->answer, 50) }}</p>
                            </td>
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3 text-sm">
                                <x-show-status :status="$faq->status"></x-show-status>
                            </td>
                            <td>
                                <div class="flex items-center justify-center">
                                    {{-- <x-buttons.show :link="route('admin.admin.show', $faq)"></x-buttons.show> --}}
                                    <x-buttons.edit :link="route('admin.faq.edit', $faq)"></x-buttons.edit>
                                    <x-buttons.delete :link="route('admin.faq.destroy', $faq)"></x-buttons.delete>
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
            {!! $faqs->links() !!}
        </div>
    </div>
@endsection