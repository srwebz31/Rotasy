<div class="flex flex-wrap w-full">
    <x-inputs.select :label="__('crud.inputs.type')" name="send_to" wire:model="send_to" wire:ignore>
        <option {{ $send_to == "ALL" ? "selected" : "" }} value="ALL">All</option>
        <option {{ $send_to == "USERS" ? "selected" : "" }} value="USERS">User</option>
        <option {{ $send_to == "PROVIDERS" ? "selected" : "" }} value="PROVIDERS">Provider</option>
    </x-inputs.select>
    
    <x-inputs.datetime name="schedule_at" :label="__('crud.inputs.schedule_at')" wire:model="scheduled_at" value=""></x-inputs.datetime>

    @if($send_to == 'USERS')
       @livewire('user-custom-push', [
            'user_condition' => $condition,
            'condition_data' => $condition_data
        ])
    @elseif($send_to == 'PROVIDERS')
        @livewire('provider-custom-push', [
            'provider_condition' => $condition,
            'condition_data' => $condition_data
        ])
    @endif
</div>