@extends('admin.layout.app')

@section('title')
    Admin - {{ __('crud.admin.roles.index') }}
@endsection

@section('heading')
    {{ __('crud.admin.roles.index') }}
@endsection

@section('content')
    <x-indexPageSearch :addBtnRoute="route('admin.role.create')" :addBtnText="__('crud.admin.roles.create')"></x-indexPageSearch>
    <div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.SNo') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.name') }}</th>
                        <th class="text-center px-4 py-3">{{ __('crud.inputs.permission') }}</th>
                        {{-- <th class="text-center px-4 py-3">{{ __('crud.general.actions') }}</th> --}}
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    {{-- Approved --}}
                    @forelse ($roles as $role)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{ $loop->index + 1 }}</td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm text-center">
                                <p class="font-semibold text-gray-700 dark:text-gray-400">{{ $role->name }}</p>
                            </td>
                            <td class="px-4 dark:text-gray-400 dark:bg-gray-800 py-3 text-sm">
                                @forelse ($role->permissions as $permission)
                                    {{ $permission->name }}
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @empty
                                    -
                                @endforelse
                            </td>
                            {{-- <td>
                                <div class="flex items-center justify-center">
                                    <x-buttons.edit :link="route('admin.role.edit', $role)"></x-buttons.edit>
                                    <x-buttons.delete :link="route('admin.role.destroy', $role)"></x-buttons.delete>
                                </div>
                            </td> --}}
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
            {!! $roles->links() !!}
        </div>
    </div>
@endsection