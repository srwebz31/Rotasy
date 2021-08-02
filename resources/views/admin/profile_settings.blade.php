@extends('admin.layout.app')

@section('title')
    Admin {{ __('crud.navlinks.setting') }}
@endsection

@section('heading')
    Admin {{ __('crud.navlinks.setting') }}
@endsection

@section('content')
    
    {{-- Tabs Starting --}}
    <div class="flex flex-wrap mb-6" id="tabs">
        <div class="w-full flex">
            <ul class="tab-head flex mb-0 list-none pb-4 flex-col">
                <li class="mr-2 mb-2 last:mr-0 text-center">
                    <a class="text-xs font-bold uppercase cursor-pointer px-5 py-3 shadow-lg rounded block leading-normal text-white bg-blue-500" onclick="changeActiveTab(event,'tab-general')" href="#general" id="#general">
                        <i class="fa fa-space-shuttle text-base mr-1"></i> Change Profile
                    </a>
                </li>
                <li class="mr-2 mb-2 last:mr-0 text-center">
                    <a class="text-xs font-bold uppercase cursor-pointer px-5 py-3 shadow-lg rounded block leading-normal text-blue-500 bg-white dark:text-gray-300 dark:bg-gray-800" onclick="changeActiveTab(event,'tab-changePassword')" href="#changePassword" id="#changePassword">
                        <i class="fa fa-cog text-base mr-1"></i> Change Password
                    </a>
                </li>
            </ul>
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded dark:text-gray-400 dark:bg-gray-800">
                <div class="px-4 py-5 flex-auto dark:text-gray-400 dark:bg-gray-800">
                    <div class="tab-content tab-space dark:text-gray-400 dark:bg-gray-800">
                        <div class="block" id="tab-general">
                            <x-form method="post" :action="route('admin.updateProfile')" has-file>
                                <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
                                    <div class="w-full md:w-1/2 mb-4 md:mb-0">
                                        <div class="h-full flex items-center justify-center relative" x-data="avatarComponentData()">
                                            <img class="rounded-full" :src="avatarDataUrl" style="object-fit: cover; width: 150px; height: 150px;"/>
                                            <label class="relative" for="avatar" title="Select New Avatar">
                                                <i class="fa rounded-full text-white bg-blue-500 absolute fa-pencil cursor-pointer" style="position: absolute; font-size: 12px; padding: 8px; top: 30px; right: 5px;"></i>
                                            </label>
                                            <input type="file" class="hidden" name="avatar" id="avatar" @change="fileChanged" />
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/2 mb-4 md:mb-0">
                                        <div class="mb-6">
                                            {{-- First Name --}}
                                            <x-inputs.text :label="__('crud.inputs.first_name')" name="name" space="w-full" value="{{ auth()->user('admin')->name ?? '' }}"></x-inputs.text>
                                            {{-- Telephone --}}
                                            <div class="w-full px-4 mb-4 md:mb-0">
                                                <div class="mb-6">
                                                    <label class="block text-gray-800 text-sm font-semibold mb-2" for="phone">{{ __('crud.inputs.phone') }}</label>
                                                    <input type="tel" class="dark:bg-gray-700 dark:text-gray-300 appearance-none w-full p-4 text-xs font-semibold leading-none bg-gray-50 rounded outline-none mb-2 inptFielsd" id="phone" value="{{ auth()->user('admin')->mobile }}" placeholder="123456789" />
                                                </div>
                                            </div>
                                            {{-- Email --}}
                                            <x-inputs.email :label="__('crud.inputs.email')" name="email" style="color: gray;" disabled value="{{ auth()->user('admin')->email ?? '' }}" space="w-full"></x-inputs.email>
                                            {{-- Langauge --}}
                                            <x-inputs.select :label="__('crud.inputs.language')" name="language" space="md:w-full">
                                                @foreach(get_all_language() as $key => $value)
                                                    <option {{ old('language', auth()->user('admin')->language && auth()->user('admin')->language == $key ? "selected" : '' ) }} value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </x-inputs.select>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit" class="right-0 inline-block py-1 px-4 leading-loose bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition duration-200 text-sm" type="submit">{{ __('crud.general.update')." ".__('crud.navlinks.profile') }}</button>
                                </div>
                            </x-form>
                        </div>
                        <div class="hidden" id="tab-changePassword">
                            <x-form method="post" :action="route('admin.changePassword')">
                                <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
                                    {{-- Old Password --}}
                                    <x-inputs.password :label="__('crud.inputs.old_password')" name="old_password" space="md:w-full"></x-inputs.password>
                                    {{-- New Password --}}
                                    <x-inputs.password :label="__('crud.inputs.new_password')" name="password"></x-inputs.password>
                                    {{-- Confirm New Password --}}
                                    <x-inputs.password :label="__('crud.inputs.password_confirmation')" name="password_confirmation"></x-inputs.password>
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit" class="right-0 inline-block py-1 px-4 leading-loose bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition duration-200 text-sm" type="submit">{{ __('crud.general.change_password') }}</button>
                                </div>
                            </x-form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Tabs Ending --}}
@endsection

@include('components.telephoneImport')

@push('endScripts')
    <script>
        /* Alpine component for avatar uploader viewer */
        function avatarComponentData() {
            return {
                avatarDataUrl: "{{ auth()->user('admin')->avatar ? asset('storage/'.auth()->user('admin')->avatar) : asset('img/avatar.png') }}",

                fileChanged(event) {
                    this.fileToDataUrl(event, src => this.avatarDataUrl = src)
                },

                fileToDataUrl(event, callback) {
                    if (! event.target.files.length) return

                    let file = event.target.files[0],
                        reader = new FileReader()

                    reader.readAsDataURL(file)
                    reader.onload = e => callback(e.target.result)
                }
            }
        }
    </script>
@endpush
