@extends('agent.layout.app')

@section('title')
    Provider {{ __('crud.navlinks.setting') }}
@endsection

@section('heading')
    Provider {{ __('crud.navlinks.setting') }}
@endsection

@section('content')
    
    {{-- Tabs Starting --}}
    <div class="flex flex-wrap mb-6" id="tabs">
        <div class="w-full flex">
            <ul class="tab-head flex mb-0 list-none pb-4 flex-col">
                <li class="mr-2 mb-2 last:mr-0 text-center">
                    <a class="text-xs font-bold uppercase cursor-pointer px-5 py-3 shadow-lg rounded block leading-normal bg-blue-500 text-white" onclick="changeActiveTab(event,'tab-general')" href="#general" id="#general">
                        <i class="fa fa-space-shuttle text-base mr-1"></i> Change Profile
                    </a>
                </li>
                <li class="mr-2 mb-2 last:mr-0 text-center">
                    <a class="text-xs font-bold uppercase cursor-pointer px-5 py-3 shadow-lg rounded block leading-normal bg-white" onclick="changeActiveTab(event,'tab-changePassword')" href="#changePassword" id="#changePassword">
                        <i class="fa fa-cog text-base mr-1"></i> Change Password
                    </a>
                </li>
            </ul>
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded dark:bg-gray-800">
                <div class="px-4 py-5 flex-auto">
                    <div class="tab-content tab-space">
                        <div class="block" id="tab-general">
                            <x-form method="post" :action="route('agent.profile.update')" has-file>
                                <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
                                    <div class="w-full md:w-1/2 mb-4 md:mb-0">
                                        <div class="h-full flex items-center justify-center relative" x-data="avatarComponentData()">
                                            <img class="rounded-full" :src="avatarDataUrl" style="object-fit: cover; width: 150px; height: 150px;"/>
                                            <label for="avatar" title="Select New Avatar">
                                                <i class="fa rounded-full text-white bg-blue-600 absolute fa-pencil cursor-pointer" style="font-size: 12px; padding: 8px; top: 10%; right: 20%"></i>
                                            </label>
                                            <input type="file" class="hidden" name="avatar" id="avatar" @change="fileChanged" />
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/2 mb-4 md:mb-0">
                                        <div class="mb-6">
                                            {{-- Name --}}
                                            <x-inputs.text space="md:w-full" readonly name="name" :label="__('crud.inputs.name')" value="{{ Auth::guard('agent')->user()->name }}"></x-inputs.text>
                                            
                                            <x-inputs.email space="md:w-full" name="email" readonly :label="__('crud.inputs.email')" value="{{ isset(Auth::guard('agent')->user()->email) ? Auth::guard('agent')->user()->email : '' }}"></x-inputs.email>

                                            <x-inputs.text space="md:w-full" name="company" :label="__('crud.inputs.company')" value="{{ isset(Auth::guard('agent')->user()->company) ? Auth::guard('agent')->user()->company : '' }}"></x-inputs.text>
                                        </div>
                                    </div>
                                    {{-- Telephone --}}
                                    <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
                                        <div class="mb-6">
                                            <label class="block text-gray-800 text-sm font-semibold mb-2" for="phone">{{ __('crud.inputs.phone') }}</label>
                                            <input type="tel" class="dark:bg-gray-700 dark:text-gray-300 appearance-none w-full p-4 text-xs font-semibold leading-none bg-gray-50 rounded outline-none mb-2 inptFielsd" id="phone" value="{{ auth()->user('agent')->mobile }}" placeholder="123456789" />
                                        </div>
                                    </div>
                                    {{-- Address --}}
                                    <x-inputs.textarea space="w-full" :label="__('crud.inputs.address')" name="address">{{ auth()->user('agent')->address ?? '' }}</x-inputs.textarea>
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit" class="right-0 inline-block py-1 px-4 leading-loose bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition duration-200 text-sm" type="submit">{{ __('crud.general.update')." ".__('crud.navlinks.profile') }}</button>
                                </div>
                            </x-form>
                        </div>
                        <div class="hidden" id="tab-changePassword">
                            <x-form method="post" :action="route('agent.password.update')">
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
        function fileName()
        {
            return {
                doc: 'Select File',
                fileChanged(event) {
                    this.fileToDataUrl(event)
                },
                fileToDataUrl(event) {
                    if (! event.target.files.length) return
                    let file = event.target.files[0];
                    this.doc = file.name;
                }
            }
        }
    </script>
    <script>
        /* Alpine component for avatar uploader viewer */
        function avatarComponentData() {
            return {
                avatarDataUrl: "{{ auth()->user('agent')->avatar ? asset('storage/'.auth()->user('agent')->avatar) : asset('img/avatar.png') }}",
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