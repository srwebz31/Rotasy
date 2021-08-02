<div class="flex flex-wrap w-full">
    {{-- Select the User Condition --}}
    <x-inputs.select :label="__('crud.inputs.user_condition')" name="user_condition" wire:model="user_condition">
        <option {{ $user_condition == "ALL" ? "selected" : "" }} value="ACTIVE">For Active Users In</option>
        <option {{ $user_condition == "USERS" ? "selected" : "" }} value="LOCATION">Users Who Are In</option>
        <option {{ $user_condition == "PROVIDERS" ? "selected" : "" }} value="RIDES">Who Used the Service More Than</option>
    </x-inputs.select>

    @if($user_condition == 'ACTIVE')
        <x-inputs.select :label="__('crud.inputs.active_duration')" name="user_active" wire:model="condition_data" wire:ignore>
            <option {{ $condition_data == "HOUR" ? "selected" : "" }} value="HOUR">Last One Hour</option>
            <option {{ $condition_data == "WEEK" ? "selected" : "" }} value="WEEK">Last Week</option>
            <option {{ $condition_data == "MONTH" ? "selected" : "" }} value="MONTH">Last Month</option>
        </x-inputs.select>
    @elseif($user_condition == 'LOCATION')
        <div class="w-full px-4 mb-6 md:mb-0 md:w-1/2">
            <label class=" dark:text-gray-400 block text-gray-800 text-sm font-semibold mb-2" for="location">
                {{ __('crud.general.location') }}
            </label>
            <input type="text" id="location" name="user_location" value="" autocomplete="off" wire:model.defer="condition_data" class="appearance-none w-full p-4 text-xs font-semibold leading-none rounded outline-none bg-gray-50 dark:bg-gray-700 dark:text-gray-300" placeholder="Enter crud.inputs.location">
        </div>
        
    @elseif($user_condition == 'RIDES')
        <x-inputs.number name="user_rides" :label="__('crud.inputs.num_trips')" wire:model.defer="condition_data" value=""></x-inputs.number>
    @endif
</div>