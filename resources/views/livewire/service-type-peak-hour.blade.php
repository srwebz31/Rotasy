<div>
    <h3 class="dark:text-gray-400 block text-gray-800 text-lg underline font-semibold mb-2 w-full">
        {{ __('crud.admin.peakHours.name') }} : {{ $ph->start_time }} - {{ $ph->end_time }}</h3>

    <x-form wire:submit.prevent="updateServicePeakHour" action="#">
        <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">

            <x-inputs.number wire:model.defer="min_price" wire:loading.attr="disabled" name="min_price" step=".01"
                :label="__('crud.inputs.min_price')" space="md:w-full" value=""></x-inputs.number>
        </div>
        <div class="flex flex-wrap -mb-4 md:mb-0">
            @if($errors->has('min_price'))
            <ul>
                @foreach($errors->all() as $error)
                <li class="text-red-500">-> {{ $error }}</li>
                @endforeach
            </ul>
            @endif
            @if(session()->has('peak_hour_success'))
            <span class="text-green-500">
                {{ session()->get('peak_hour_success') }}
            </span>
            @endif
        </div>
        <div class="flex justify-end mb-6">
            <button wire:loading.remove type="submit"
                class="right-0 inline-block py-1 px-4 leading-loose bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition duration-200 text-sm">{{ __('crud.general.update') }}
                Charges For {{ __('crud.admin.peakHours.name') }}</button>
            <button wire:loading disabled
                class="right-0 block py-1 px-4 leading-loose bg-green-500 hover:bg-green-400 text-white font-semibold rounded-lg transition duration-200 text-sm"><i
                    class="fa-spinner fa-pulse fa"></i> {{ __('crud.general.updating') }} Charges For
                {{ __('crud.admin.peakHours.name') }}</button>
        </div>
    </x-form>
</div>