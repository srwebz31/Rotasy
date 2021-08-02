<div class="flex flex-wrap w-full">
    {{-- Select the Provider Condition --}}
    <x-inputs.select :label="__('crud.inputs.provider_condition')" name="provider_condition" wire:model="provider_condition">
        <option {{ $provider_condition == "ALL" ? "selected" : "" }} value="ACTIVE">For Active Providers In</option>
        <option {{ $provider_condition == "PROVIDERS" ? "selected" : "" }} value="LOCATION">Providers Who Are In</option>
        <option {{ $provider_condition == "PROVIDERS" ? "selected" : "" }} value="RIDES">Who Answered More Than</option>
    </x-inputs.select>

    @if($provider_condition == 'ACTIVE')
        <x-inputs.select :label="__('crud.inputs.active_duration')" name="provider_active" wire:model="provider_active" wire:ignore>
            <option {{ $condition_data == "HOUR" ? "selected" : "" }} value="HOUR">Last One Hour</option>
            <option {{ $condition_data == "WEEK" ? "selected" : "" }} value="WEEK">Last Week</option>
            <option {{ $condition_data == "MONTH" ? "selected" : "" }} value="MONTH">Last Month</option>
        </x-inputs.select>
    @elseif($provider_condition == 'LOCATION')
        <div class="w-full px-4 mb-6 md:mb-0 md:w-1/2">
            <label class=" dark:text-gray-400 block text-gray-800 text-sm font-semibold mb-2" for="location">
                {{ __('crud.general.location') }}
            </label>
            <input type="text" id="location" name="provider_location" value="" autocomplete="off" wire:model.defer="condition_data" class="appearance-none w-full p-4 text-xs font-semibold leading-none rounded outline-none bg-gray-50 dark:bg-gray-700 dark:text-gray-300" placeholder="Enter crud.inputs.location">
        </div>
    @elseif($provider_condition == 'RIDES')
        <x-inputs.number name="provider_rides" wire:model.defer="condition_data" :label="__('crud.inputs.num_trips')" value=""></x-inputs.number>
    @endif
</div>