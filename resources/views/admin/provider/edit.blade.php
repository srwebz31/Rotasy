@extends('admin.layout.app')

@section('title')
Admin - {{ __('crud.admin.providers.update') }}
@endsection

@section('heading')
{{ __('crud.admin.providers.update') }}
@endsection

@section('content')
    <div class="w-full rounded-lg shadow-xs bg-white dark:text-gray-400 dark:bg-gray-800 mb-5">
        <div class="w-full px-5 py-5">
            <x-form action="{{ route('admin.provider.update', $provider) }}" method="put" has-file>
                @include('admin.provider.form-inputs')

                <div class="flex justify-end">
                    <button type="submit"
                        class="right-0 inline-block py-1 px-4 leading-loose bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition duration-200 text-sm"
                        type="submit">Submit</button>
                </div>
            </x-form>
        </div>
    </div>
    <div class="w-full rounded-lg shadow-xs bg-white dark:text-gray-400 dark:bg-gray-800 mb-5">
        <div class="w-full px-5 py-5">
            <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                Add Services
            </h4>
            <livewire:provider-services :provider="$provider" />
        </div>
    </div>
    <div class="w-full rounded-lg shadow-xs bg-white dark:text-gray-400 dark:bg-gray-800 mb-5">
        <div class="w-full">
            <table class="w-full whitespace-no-wrap dark:border-gray-700">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.SNo') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.admin.documents.name') }} {{ __('crud.inputs.name') }}
                        </th>
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.status') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.general.actions') }}</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    {{-- All Provider Documents --}}
                    @forelse ($providerDocuments as $doc)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                            {{ $loop->index + 1 }}
                        </td>
                        <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                            {{ $doc->document->name }}
                        </td>
                        <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3 text-sm">
                            @if ($doc->status == "ACTIVE")
                            <span
                                class="px-2 py-1 font-semibold leading-tight text-green-600 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100 text-xs">
                                Active
                            </span>
                            @elseif($doc->status == "ASSESSING")
                            <span
                                class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:text-white dark:bg-yellow-600 text-xs">
                                Accessing
                            </span>
                            @endif
                        </td>
                        <td>
                            <div class="flex items-center justify-center">
                                <x-buttons.show title="Show Document" target="_blank" :link="asset('storage/'.$doc->url)">
                                </x-buttons.show>

                                @if ($doc->status == "ASSESSING")
                                <a href="{{ route('admin.acceptProviderDocument', $doc) }}"
                                    class="bg-green-400 text-white rounded-full flex w-8 h-8 justify-center items-center hover:bg-green-500 mx-1"
                                    title="Validate Document">
                                    <i class="fa fa-check"></i>
                                </a>
                                @endif

                                <x-buttons.delete title="Delete Document"
                                    :link="route('admin.rejectProviderDocument', $doc)"></x-buttons.delete>
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
                    <tr>
                        <td class="text-center dark:text-gray-400 dark:bg-gray-800 py-3 text-sm" colspan="10">
                            @if ($provider->blocked == '0')

                            <x-form action="{{ route('admin.provider.approveProvider', $provider) }}" method="put" has-file>
                                <button type="submit"
                                    class="bg-green-400 text-white rounded px-3 py-2 flex justify-center mx-3 float-right items-center hover:bg-green-500 m-3"
                                    title="Validate Document">
                                    <i class="fa fa-check"></i>&nbsp;Approve Provider
                                </button>
                            </x-form>
                            @else
                            <x-form action="{{ route('admin.provider.blockProvider', $provider) }}" method="put" has-file>
                                <button type="submit"
                                    class="bg-red-400 text-white rounded px-3 py-2 flex justify-center items-center mx-3 float-right hover:bg-red-500"
                                    title="Validate Document">
                                    <i class="fa fa-ban"></i>&nbsp;Block Provider
                                </button>
                            </x-form>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection

@include('components.telephoneImport')