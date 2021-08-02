@extends('admin.layout.app')

@section('title')
    Admin - {{ __('crud.admin.users.show') }}
@endsection

@section('content')
    <div class="w-full rounded-lg shadow-xs bg-white dark:text-gray-400 dark:bg-gray-800 mb-5">
        <div class="w-full px-5 py-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="{{ route('admin.user.index') }}" class="mr-2"><i class="icon ion-md-arrow-back"></i></a>
                        {{ __('crud.admin.users.show') }}
                    </h4>
    
                    <div class="mt-4 row">
                        <div class="col-lg-4 col-md-12">
                            <div class="text-center">
                                <img class="my-3" src="{{ $user->avatar ? asset('storage/'.$user->avatar) : asset('img/avatar.png') }}" style="object-fit: cover; width: 150px; height: 150px; border: 1px solid #ccc; border-radius: 50%;" />
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 d-flex align-items-center">
                            <table wire:loading.remove wire:target="editMode" style="width: 100%;">
                                <tr class="view_td_container">
                                    <td class="view_td key">@lang('crud.admin.users.name')</td>
                                    <td class="view_td value">{{ $user->name ?? '-' }}</td>
                                    <td class="view_td key">@lang('crud.admin.users.email')</td>
                                    <td class="view_td value">{{ $user->email ?? '-' }}</td>
                                </tr>
                                <tr class="view_td_container">
                                    <td class="view_td key">@lang('crud.admin.users.phone')</td>
                                    <td class="view_td value">{{ $user->phone ?? '-' }}</td>
                                    <td class="view_td key">@lang('crud.roles.name')</td>
                                    <td class="view_td value">
                                        hdo
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection