@extends('admin.layout.app')

@section('title')
Admin - {{ __('crud.navlinks.setting') }}
@endsection

@section('heading')
{{ __('crud.navlinks.setting') }}
@endsection

@section('content')
{{-- Tabs Starting --}}
<div class="flex flex-wrap mb-6" id="tabs">
    <div class="w-full">
        <ul class="tab-head flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row">
            <li class="mr-2 mb-2 last:mr-0 flex-auto text-center">
                <a class="text-xs font-bold uppercase cursor-pointer px-5 py-3 shadow-lg rounded block leading-normal text-white bg-blue-500"
                    onclick="changeActiveTab(event,'tab-header')" href="#header" id="#header">
                    <i class="fa fa-space-shuttle text-base mr-1"></i> Header
                </a>
            </li>
            <li class="mr-2 mb-2 last:mr-0 flex-auto text-center">
                <a class="text-xs font-bold uppercase cursor-pointer px-5 py-3 shadow-lg rounded block leading-normal text-blue-500 bg-white dark:text-gray-300 dark:bg-gray-800"
                    onclick="changeActiveTab(event,'tab-steps')" href="#steps" id="#steps">
                    <i class="fa fa-list text-base mr-1"></i> Steps To Take
                </a>
            </li>
            <li class="mr-2 mb-2 last:mr-0 flex-auto text-center">
                <a class="text-xs font-bold uppercase cursor-pointer px-5 py-3 shadow-lg rounded block leading-normal text-blue-500 bg-white dark:text-gray-300 dark:bg-gray-800"
                    onclick="changeActiveTab(event,'tab-appDisplay')" href="#appDisplay" id="#appDisplay">
                    <i class="fa fa-play text-base mr-1"></i> App Section
                </a>
            </li>
        </ul>
        <div
            class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded dark:text-gray-400 dark:bg-gray-800">
            <div class="px-4 py-5 flex-auto dark:text-gray-400 dark:bg-gray-800">
                <div class="tab-content tab-space dark:text-gray-400 dark:bg-gray-800">
                    <div class="block" id="tab-header">
                        <x-form method="post" :action="route('admin.settings.frontend.headSetting')" has-file>
                            <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
                                <x-inputs.text :label="__('crud.admin.frontend.heading')" name="home_heading"
                                    value="{{ array_key_exists('home_heading', $settings) ? $settings['home_heading'] : old('home_heading', '')  }}">
                                </x-inputs.text>
                                <x-inputs.text :label="__('crud.admin.frontend.tagLine')" name="home_tag_line"
                                    value="{{ array_key_exists('home_tag_line', $settings) ? $settings['home_tag_line'] : old('home_tag_line', '')  }}">
                                </x-inputs.text>

                                <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
                                    <div class="mb-6">
                                        <x-inputs.partials.label name="side_image"
                                            :label="__('crud.admin.frontend.side_image')"></x-inputs.partials.label>
                                        <img class="h-20"
                                            src="{{ array_key_exists('home_side_image', $settings) ? asset('storage/'.$settings['home_side_image']) : asset('img/gray-400-horizontal.png') }}"
                                            alt="" width="">
                                        <input
                                            class="appearance-none w-full p-4 text-xs font-semibold leading-none bg-gray-50 rounded outline-none dark:bg-gray-700 dark:text-gray-300"
                                            type="file" name="home_side_image" value="" id="side_image" />
                                    </div>
                                </div>

                                <div class="w-full px-4 mb-4 md:mb-0">
                                    <div class="mb-6">
                                        <button type="submit"
                                            class="right-0 float-right inline-block py-1 px-4 leading-loose bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition duration-200 text-sm"
                                            type="submit">{{ __('crud.general.update') }}</button>
                                    </div>
                                </div>
                            </div>
                        </x-form>
                    </div>
                    <div class="hidden dark:text-gray-400 dark:bg-gray-800" id="tab-steps">
                        <x-form method="post" :action="route('admin.settings.frontend.steps')">
                            <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
                                {{-- First --}}
                                <x-inputs.text :label="__('crud.admin.frontend.home_step_title').' 1'"
                                    name="home_step_title1"
                                    value="{{ array_key_exists('home_step_title1', $settings) ? $settings['home_step_title1'] : old('home_step_title1', '')  }}">
                                </x-inputs.text>
                                <x-inputs.text :label="__('crud.admin.frontend.home_step_desc').' 1'"
                                    name="home_step_desc1"
                                    value="{{ array_key_exists('home_step_desc1', $settings) ? $settings['home_step_desc1'] : old('home_step_desc1', '')  }}">
                                </x-inputs.text>

                                <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
                                    <div class="mb-6">
                                        <x-inputs.partials.label name="home_step_image1"
                                            :label="__('crud.admin.frontend.home_step_image').' 1'">
                                        </x-inputs.partials.label>
                                        <img class="h-20"
                                            src="{{ array_key_exists('home_step_image1', $settings) ? asset('storage/'.$settings['home_step_image1']) : asset('img/gray-400-horizontal.png') }}"
                                            alt="" width="">
                                        <input
                                            class="appearance-none w-full p-4 text-xs font-semibold leading-none bg-gray-50 rounded outline-none dark:bg-gray-700 dark:text-gray-300"
                                            type="file" name="home_step_image1" value="" id="home_step_image1" />
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
                                {{-- Second --}}
                                <x-inputs.text :label="__('crud.admin.frontend.home_step_title').' 2'"
                                    name="home_step_title2"
                                    value="{{ array_key_exists('home_step_title2', $settings) ? $settings['home_step_title2'] : old('home_step_title2', '')  }}">
                                </x-inputs.text>
                                <x-inputs.text :label="__('crud.admin.frontend.home_step_desc').' 2'"
                                    name="home_step_desc2"
                                    value="{{ array_key_exists('home_step_desc2', $settings) ? $settings['home_step_desc2'] : old('home_step_desc2', '')  }}">
                                </x-inputs.text>

                                <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
                                    <div class="mb-6">
                                        <x-inputs.partials.label name="side_image"
                                            :label="__('crud.admin.frontend.home_step_image').' 2'">
                                        </x-inputs.partials.label>
                                        <img class="h-20"
                                            src="{{ array_key_exists('home_step_image2', $settings) ? asset('storage/'.$settings['home_step_image2']) : asset('img/gray-400-horizontal.png') }}"
                                            alt="" width="">
                                        <input
                                            class="appearance-none w-full p-4 text-xs font-semibold leading-none bg-gray-50 rounded outline-none dark:bg-gray-700 dark:text-gray-300"
                                            type="file" name="home_step_image2" value="" id="side_image" />
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
                                {{-- Third --}}
                                <x-inputs.text :label="__('crud.admin.frontend.home_step_title').' 3'"
                                    name="home_step_title3"
                                    value="{{ array_key_exists('home_step_title3', $settings) ? $settings['home_step_title3'] : old('home_step_title3', '')  }}">
                                </x-inputs.text>
                                <x-inputs.text :label="__('crud.admin.frontend.home_step_desc').' 3'"
                                    name="home_step_desc3"
                                    value="{{ array_key_exists('home_step_desc3', $settings) ? $settings['home_step_desc3'] : old('home_step_desc3', '')  }}">
                                </x-inputs.text>

                                <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
                                    <div class="mb-6">
                                        <x-inputs.partials.label name="side_image"
                                            :label="__('crud.admin.frontend.home_step_image').' 3'">
                                        </x-inputs.partials.label>
                                        <img class="h-20"
                                            src="{{ array_key_exists('home_step_image3', $settings) ? asset('storage/'.$settings['home_step_image3']) : asset('img/gray-400-horizontal.png') }}"
                                            alt="" width="">
                                        <input
                                            class="appearance-none w-full p-4 text-xs font-semibold leading-none bg-gray-50 rounded outline-none dark:bg-gray-700 dark:text-gray-300"
                                            type="file" name="home_step_image3" value="" id="side_image" />
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit"
                                    class="right-0 inline-block py-1 px-4 leading-loose bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition duration-200 text-sm"
                                    type="submit">{{ __('crud.general.update') }}</button>
                            </div>
                        </x-form>
                    </div>
                    <div class="hidden dark:text-gray-400 dark:bg-gray-800" id="tab-appDisplay">
                        <x-form method="post" :action="route('admin.settings.frontend.appDisplay')">
                            <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
                                {{-- First --}}
                                <x-inputs.text :label="__('crud.admin.frontend.home_app_title')" name="home_app_title"
                                    value="{{ array_key_exists('home_app_title', $settings) ? $settings['home_app_title'] : old('home_app_title', '')  }}">
                                </x-inputs.text>
                                <x-inputs.text :label="__('crud.admin.frontend.home_app_desc')" name="home_app_desc"
                                    value="{{ array_key_exists('home_app_desc', $settings) ? $settings['home_app_desc'] : old('home_app_desc', '')  }}">
                                </x-inputs.text>

                                <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
                                    <div class="mb-6">
                                        <x-inputs.partials.label name="home_app_image"
                                            :label="__('crud.admin.frontend.home_app_image')"></x-inputs.partials.label>
                                        <img class="h-20"
                                            src="{{ array_key_exists('home_app_image', $settings) ? asset('storage/'.$settings['home_app_image']) : asset('img/2-devices-left.svg') }}"
                                            alt="" width="">
                                        <input
                                            class="appearance-none w-full p-4 text-xs font-semibold leading-none bg-gray-50 rounded outline-none dark:bg-gray-700 dark:text-gray-300"
                                            type="file" name="home_app_image" value="" id="home_app_image" />
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit"
                                    class="right-0 inline-block py-1 px-4 leading-loose bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition duration-200 text-sm"
                                    type="submit">{{ __('crud.general.update') }}</button>
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