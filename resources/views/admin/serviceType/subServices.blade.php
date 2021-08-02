@extends('admin.layout.app')

@section('title')
Admin - {{ __('crud.admin.serviceTypes.update') }}
@endsection

@section('heading')
{{ __('crud.admin.serviceTypes.update') }}
@endsection

@section('content')
<div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="text-center px-4 py-3">{{ __('crud.inputs.SNo') }}</th>
                    <th class="text-center px-4 py-3">{{ __('crud.inputs.name') }}</th>
                    <th class="text-center px-4 py-3">{{ __('crud.inputs.description') }}</th>
                    <th class="text-center px-4 py-3">{{ __('crud.inputs.sub_category') }}</th>
                    <th class="text-center px-4 py-3">{{ __('crud.inputs.status') }}</th>
                    <th class="text-center px-4 py-3">{{ __('crud.general.actions') }}</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                {{-- Approved --}}
                @php
                $i = 0;
                @endphp
                @forelse ($serviceType->subServices as $st)
                @if($st->parent_id == $st->id)
                @continue
                @else
                @php
                $i++
                @endphp
                @endif
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{ $i }}</td>
                    <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm">
                        <div class="flex items-center text-sm">
                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                <img class="object-cover w-full h-full rounded-full"
                                    src="{{ $st->image ? asset('storage/'.$st->image) : asset('img/avatar.png') }}"
                                    alt="" loading="lazy" />
                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-700 dark:text-gray-400">{{ $st->name }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm">
                        <p class="font-semibold text-gray-700 dark:text-gray-400">{{ Str::limit($st->description, 70) }}
                        </p>
                    </td>
                    <td
                        class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm @if(!$st->subServices->count()) text-center @endif">
                        @forelse ($st->subServices as $service)
                        {{ $service->name }}
                        @if (!$loop->last)
                        ,
                        @endif
                        @empty
                        -
                        @endforelse
                    </td>
                    <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                        <x-show-status :status="$st->status"></x-show-status>
                    </td>
                    <td>
                        <div class="flex items-center justify-center">
                            {{-- <x-buttons.show :link="route('admin.admin.show', $st)"></x-buttons.show> --}}
                            <x-buttons.edit :link="route('admin.serviceType.edit', $st)"></x-buttons.edit>
                            <x-buttons.delete :link="route('admin.serviceType.destroy', $st)"></x-buttons.delete>
                            <a target="_blank" href="{{ route('admin.subServices',$st) }}"
                                class="bg-blue-400 text-white rounded-full flex w-8 h-8 justify-center items-center hover:bg-blue-500 mx-1">
                                <i class="fa fa-code-fork"></i>
                            </a>
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
</div>
@endsection