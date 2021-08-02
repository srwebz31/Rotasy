<div>
    <h3 class="dark:text-gray-400 block text-gray-800 text-lg underline font-semibold mb-2 w-full">{{ $gf->city_name }}
    </h3>
    @php
    $rand = rand(1,100);
    @endphp

    <x-form wire:submit.prevent="updateServiceGeoFence" action="#">
        <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">

            <x-inputs.number :idSuff="$gf->id" wire:model.defer="distance" wire:loading.attr="disabled" name="distance"
                step=".01" :label="__('crud.inputs.base_distance')" value="" space="md:w-1/4"></x-inputs.number>

            <x-inputs.number :idSuff="$gf->id" wire:model.defer="price" name="price" step=".01"
                wire:loading.attr="disabled" :label="__('crud.payment.distance_price')" value="" space="md:w-1/4">
            </x-inputs.number>

            <x-inputs.number :idSuff="$gf->id" wire:model.defer="minute" wire:loading.attr="disabled" name="minute"
                step=".01" :label="__('crud.payment.minutes_price')" value="" space="md:w-1/4"></x-inputs.number>

            {{-- <x-inputs.number :idSuff="$gf->id" wire:model.defer="hour" name="hour" step=".01"
                wire:loading.attr="disabled" :label="__('crud.inputs.hour')" value="" space="md:w-1/4">
            </x-inputs.number> --}}

            {{-- <x-inputs.number :idSuff="$gf->id" wire:model.defer="distance" wire:loading.attr="disabled" name="distance" step=".01" :label="__('crud.inputs.distance')" value="" space="md:w-1/4"></x-inputs.number> --}}

            {{-- <x-inputs.number :idSuff="$gf->id" wire:model.defer="non_geo_price" wire:loading.attr="disabled" name="non_geo_price" step=".01" :label="__('crud.inputs.non_geo_price')" value="" space="md:w-1/4"></x-inputs.number> --}}

            <x-inputs.number :idSuff="$gf->id" wire:model.defer="city_limits" wire:loading.attr="disabled"
                name="city_limits" step=".01" :label="__('crud.inputs.city_limits')" value="" space="md:w-1/4">
            </x-inputs.number>

            <div class="w-full px-4 mb-4 md:mb-0">
                <div class="mb-6">
                    <x-inputs.partials.label name="ed{{$gf->id}}" :label="__('crud.general.enable')">
                    </x-inputs.partials.label>
                    <label for="ed{{$gf->id}}" class="flex items-center cursor-pointer">
                        <div class="relative">
                            <input type="checkbox" id="ed{{$gf->id}}" class="sr-only" wire:model.defer="status">
                            <div class="block bg-gray-600 w-14 h-8 rounded-full"></div>
                            <div class="dot absolute left-1 top-1 w-6 h-6 rounded-full transition"></div>
                        </div>
                    </label>
                </div>
            </div>
            <style>
                input:checked~.dot {
                    transform: translateX(100%);
                    background: rgba(249, 250, 251);
                }

                input:not(:checked)~.dot {
                    background: rgba(249, 250, 251);
                    opacity: 0.5;
                    transform: translateX(0%);
                }
            </style>

        </div>
        <div class="flex flex-wrap -mb-4 md:mb-0">
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                <li class="text-red-500">-> {{ $error }}</li>
                @endforeach
            </ul>
            @endif
        </div>
        <div class="flex justify-end mb-6">
            <button wire:loading.remove type="submit"
                class="right-0 inline-block py-1 px-4 leading-loose bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition duration-200 text-sm">{{ __('crud.general.update') }}
                Charges For {{ $gf->city_name }}</button>
            <button wire:loading disabled
                class="right-0 block py-1 px-4 leading-loose bg-green-500 hover:bg-green-400 text-white font-semibold rounded-lg transition duration-200 text-sm"><i
                    class="fa fa-spinner fa-spin"></i> {{ __('crud.general.updating') }} Charges For
                {{ $gf->city_name }}</button>
        </div>
    </x-form>
</div>