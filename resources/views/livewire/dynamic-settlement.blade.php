<div class="flex flex-wrap -mb-4 md:mb-0 w-full" x-data={searchResult:false}>
    <x-inputs.select :label="__('crud.inputs.type')" name="request_from" wire:change="getDetails()"
        wire:model="user_type">
        <option {{ old('user_type', '') == "Provider" ? 'selected' : '' }} value="Provider">Provider</option>
        {{-- <option {{ old('user_type', '') == "User" ? 'selected' : '' }} value="User">User</option> --}}
        <option {{ old('user_type', '') == "Agent" ? 'selected' : '' }} value="Agent">Agent</option>
    </x-inputs.select>

    <input class="hidden" type="text" wire:model="user_id" name="from_id" value="{{ $user_id }}">

    {{-- <livewire:select2-auto-search wire:change="getDetails()" :mod="$user_type" :type="$user_type"
        :label="__('crud.inputs.user_id')" value="{{ $user_id }}" /> --}}
    <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
        {{-- <div class="mb-6">
            <label class="dark:text-gray-400 capitalize block text-gray-800 text-sm font-semibold mb-2">
                {{$user_type}} Email
            </label>
            <input type="email" class="@if(!$found_status) border border-red-400 @endif appearance-none w-full p-4 text-xs font-semibold leading-none bg-gray-50 rounded outline-none dark:bg-gray-700 dark:text-gray-400" placeholder="{{ ucfirst(strtolower($user_type)) }} Email" wire:model="email" value="{{!empty($user) ? $user->email : ''}}">
        </div> --}}
        <div class="relative w-full" x-on:click.away="searchResult=false">
            <label class="dark:text-gray-400 capitalize block text-gray-800 text-sm font-semibold mb-2">
                {{$user_type}} Email
            </label>
            <input type="email" placeholder="{{ ucfirst(strtolower($user_type)) }} Email"
                class="appearance-none w-full text-xs font-semibold leading-none rounded outline-none bg-gray-50 dark:bg-gray-700 dark:text-gray-300 p-4" wire:model="email"  x-on:focus="searchResult='true'" value="{{!empty($user) ? $user->email : ''}}">
            
            <ul class="divide-y dark:divide-gray-700 absolute w-full dark:bg-gray-900 dark:text-gray-500 bg-white border-l border-r border-b dark:border-gray-700"
                x-show="searchResult" style="max-height: 200px; overflow-y: scroll; z-index: 20;">
                <li class="p-3 dark:bg-gray-900 dark:text-gray-500 text-center" wire:loading>
                    <i class="fa-spinner fa-pulse fa"></i>
                </li>
                @forelse ($suggestions as $suggest)
                    <li class="dark:bg-gray-900 dark:text-gray-500" wire:loading.remove>
                        <div class="flex justify-between">
                            <button type="button" class="text-left p-3 w-full h-full focus:outline-none" wire:click="selectUser({{$suggest->id}})">
                                {{ $suggest->name }} (Email:- {{ $suggest->email }})
                            </button>
                        </div>
                    </li>
                @empty
                    <li class="p-3 dark:bg-gray-900 dark:text-gray-500" wire:loading.remove>
                        No Search Results Found
                    </li>
                @endforelse
            </ul>
        </div>
    </div>

    <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
        <div class="mb-6">
            <label class="dark:text-gray-400 block text-gray-800 text-sm font-semibold mb-2 capitalize">
                {{$user_type}} Name
            </label>
            <input type="text"
                class="@if(!$found_status) border border-red-400 @endif appearance-none w-full p-4 text-xs font-semibold leading-none bg-gray-50 rounded outline-none dark:bg-gray-700 dark:text-gray-400 capitalize"
                placeholder="{{($user_type)}} Name" value="{{!empty($user) ? $user->name : '-'}}" disabled readonly>
        </div>
    </div>

    <x-inputs.select :label="__('crud.inputs.type')" name="type" >
        <option {{ old('type', '') == "C" ? 'selected' : '' }} value="C">Credit</option>
        <option {{ old('type', '') == "D" ? 'selected' : '' }} value="D">Debit</option>
    </x-inputs.select>
</div>