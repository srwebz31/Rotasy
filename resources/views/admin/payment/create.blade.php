@extends('admin.layout.app')

@section('title')
Admin - {{ __('crud.admin.settlements.create') }}
@endsection

@section('heading')
{{ __('crud.admin.settlements.create') }}
@endsection

@section('content')
<div class="w-full rounded-lg shadow-xs bg-white dark:text-gray-400 dark:bg-gray-800 mb-5">
    <div class="w-full px-5 py-5">
        <x-form action="{{ route('admin.settlement.store') }}" method="post">
            <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
                @php
                    $user_type = old('request_from', 'provider');
                    $user_id = old('from_id', NULL);
                @endphp
                @livewire('dynamic-settlement', [
                    'type' => $user_type, 
                    'id' => $user_id
                ])

                <x-inputs.number name="amount" :label="__('crud.inputs.amount')" value="{{ old('amount', '') }}">
                </x-inputs.number>

                <x-inputs.select :label="__('crud.inputs.mode')" name="send_by">
                    <option {{ old('mode', '') == "Online" ? 'selected' : '' }} value="Online">Online</option>
                    <option {{ old('mode', '') == "Offline" ? 'selected' : '' }} value="Offline">Offline</option>
                </x-inputs.select>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="right-0 inline-block py-1 px-4 leading-loose bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition duration-200 text-sm"
                    type="submit">Add {{ __('crud.admin.settlements.name') }}</button>
            </div>
        </x-form>
    </div>
</div>
@endsection