@extends('provider.layout.app')

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
                    <a class="text-xs font-bold uppercase cursor-pointer px-5 py-3 shadow-lg rounded block leading-normal text-white bg-pink-600" onclick="changeActiveTab(event,'tab-general')" href="#general" id="#general">
                        <i class="fa fa-space-shuttle text-base mr-1"></i> Change Profile
                    </a>
                </li>
                <li class="mr-2 mb-2 last:mr-0 text-center">
                    <a class="text-xs font-bold uppercase cursor-pointer px-5 py-3 shadow-lg rounded block leading-normal text-pink-600 bg-white" onclick="changeActiveTab(event,'tab-changePassword')" href="#changePassword" id="#changePassword">
                        <i class="fa fa-cog text-base mr-1"></i> Change Password
                    </a>
                </li>
                <li class="mr-2 mb-2 last:mr-0 text-center">
                    <a class="text-xs font-bold uppercase cursor-pointer px-5 py-3 shadow-lg rounded block leading-normal text-pink-600 bg-white" onclick="changeActiveTab(event,'tab-verification')" href="#verification" id="#verification">
                        <i class="fa fa-check-circle text-base mr-1"></i> Verified
                    </a>
                </li>
            </ul>
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                <div class="px-4 py-5 flex-auto">
                    <div class="tab-content tab-space">
                        <div class="block" id="tab-general">
                            <x-form method="post" :action="route('provider.updateProfile')" has-file>
                                <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
                                    <div class="w-full md:w-1/2 mb-4 md:mb-0">
                                        <div class="h-full flex items-center justify-center relative" x-data="avatarComponentData()">
                                            <img class="rounded-full" :src="avatarDataUrl" style="object-fit: cover; width: 150px; height: 150px;"/>
                                            <label for="avatar" title="Select New Avatar">
                                                <i class="fa rounded-full text-white bg-pink-600 absolute fa-pencil cursor-pointer" style="font-size: 12px; padding: 8px; top: 10%; right: 20%"></i>
                                            </label>
                                            <input type="file" class="hidden" name="avatar" id="avatar" @change="fileChanged" />
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/2 mb-4 md:mb-0">
                                        <div class="mb-6">
                                            {{-- First Name --}}
                                            <x-inputs.text :label="__('crud.inputs.first_name')" name="first_name" space="w-full" value="{{ auth()->user('provider')->first_name ?? '' }}"></x-inputs.text>
                                            {{-- Last Name --}}
                                            <x-inputs.text :label="__('crud.inputs.last_name')" name="last_name" space="w-full" value="{{ auth()->user('provider')->last_name ?? ''}}"></x-inputs.text>
                                            {{-- Agent Id --}}
                                            <x-inputs.text :label="__('crud.inputs.agent')" name="agent_id" space="w-full" value="{{ auth()->user('provider')->agent_id ?? '' }}"></x-inputs.text>
                                        </div>
                                    </div>
                                    {{-- Email --}}
                                    <x-inputs.email :label="__('crud.inputs.email')" name="email" style="color: gray;" disabled value="{{ auth()->user('provider')->email ?? '' }}"></x-inputs.email>
                                    {{-- Telephone --}}
                                    <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
                                        <div class="mb-6">
                                            <label class="block text-gray-800 text-sm font-semibold mb-2" for="phone">{{ __('crud.inputs.phone') }}</label>
                                            <input type="tel" class="dark:bg-gray-700 dark:text-gray-300 appearance-none w-full p-4 text-xs font-semibold leading-none bg-gray-50 rounded outline-none mb-2 inptFielsd" id="phone" value="{{ auth()->user('provider')->mobile }}" placeholder="123456789" />
                                        </div>
                                    </div>
                                    {{-- Address --}}
                                    <x-inputs.textarea space="w-full" :label="__('crud.inputs.address')" name="address">{{ auth()->user('provider')->address ?? '' }}</x-inputs.textarea>
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit" class="right-0 inline-block py-1 px-4 leading-loose bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition duration-200 text-sm" type="submit">{{ __('crud.general.update')." ".__('crud.navlinks.profile') }}</button>
                                </div>
                            </x-form>
                        </div>
                        <div class="hidden" id="tab-changePassword">
                            <x-form method="post" :action="route('provider.changePassword')">
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
                        <div class="hidden" id="tab-verification">
                            @if(!empty($notGiven))
                                <x-form method="post" :action="route('provider.uploadVerificationDocument')">
                                    @foreach ($required as $req)
                                        @if(!in_array($req->id, $ids))
                                            <div x-data="fileName()" class="w-full mb-5">
                                                <label class="w-full rounded font-bold py-2 px-4 items-center flex justify-between border" for="document{{$loop->index}}">
                                                    <span class="text-sm font-medium" x-text="doc"></span>
                                                    <span class="bg-indigo-500 text-white hover:bg-indigo-dark py-2 px-4 items-center text-xs rounded">
                                                        {{ $req->name }}
                                                    </span>
                                                </label>
                                                <input type="file" class="hidden" id="document{{$loop->index}}" @change="fileChanged" name="document[{{$req->id}}]">
                                            </div>
                                        @endif
                                    @endforeach
                                    <div class="flex justify-end">
                                        <button type="submit" class="right-0 inline-block py-1 px-4 leading-loose bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition duration-200 text-sm" type="submit">{{ __('crud.general.submit') }} {{ __('crud.inputs.documents') }}</button>
                                    </div>
                                </x-form>
                            <br><hr><br>
                            @endif
                            <div>
                                <h2 class="font-semibold">{{ __('crud.inputs.documents') }}</h2>
                                <br>
                                <div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
                                    <div class="w-full overflow-x-auto">
                                        <table class="w-full whitespace-no-wrap">
                                            <thead>
                                                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                    <th class="text-center px-4 py-3">{{ __('crud.inputs.name') }}</th>
                                                    <th class="text-center px-4 py-3">{{ __('crud.inputs.status') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                                {{-- Approved --}}
                                                @forelse ($documents as $doc)
                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                        <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3 text-sm">
                                                            {{ $doc->document->name ?? 'INR' }}
                                                        </td>
                                                        <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3 text-sm">
                                                            @if ($doc->status == "ACTIVE")
                                                                <span class="px-2 py-1 font-semibold leading-tight text-green-600 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100 text-xs">
                                                                    Active
                                                                </span>
                                                            @elseif($doc->status == "ASSESSING")
                                                                <span class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:text-white dark:bg-yellow-600 text-xs">
                                                                    Accessing
                                                                </span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td class="text-center dark:text-gray-400 dark:bg-gray-800 py-3 text-sm" colspan="6">
                                                            @lang('crud.general.not_found')
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
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
                avatarDataUrl: "{{ auth()->user('provider')->avatar ? asset('storage/'.auth()->user('provider')->avatar) : asset('img/avatar.png') }}",

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

