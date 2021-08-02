<div class="flex items-center">
    <div class="w-full">
        <x-form wire:submit.prevent="updateServiceRentalPackage" action="#">
            <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0 items-center">
                <div class="w-3/12">
                    <x-inputs.number wire:model.defer="hour" wire:loading.attr="disabled" name="hour" value="" space="md:w-full" :showError="1==1"></x-inputs.number>
                </div>
                <div class="w-3/12">
                    <x-inputs.number wire:model.defer="km" wire:loading.attr="disabled" name="km" value="" space="md:w-full" :showError="1==1"></x-inputs.number>
                </div>
                <div class="w-3/12">
                    <x-inputs.number wire:model.defer="price" wire:loading.attr="disabled" name="price" value="" space="md:w-full" :showError="1==1"></x-inputs.number>
                </div>
                <div class="w-3/12">
                    <div class="w-full px-4 mb-4 md:mb-0">
                        <div class="mb-6">
                            {{-- Update Button --}}
                            <button wire:target="updateServiceRentalPackage" wire:loading.remove type="submit" class="right-0 inline-block w-8 h-8 rounded-full leading-loose bg-green-500 hover:bg-green-600 text-white font-semibold transition duration-200 text-sm"><i class="fa fa-check"></i></button>

                            <button wire:loading wire:target="updateServiceRentalPackage" disabled class="right-0 block w-8 h-8  leading-loose bg-green-500 hover:bg-green-400 text-white font-semibold rounded-full transition duration-200 text-sm"><i class="fa fa-spinner fa-spin"></i></button>
                            
                            {{-- Delete Button --}}
                            <button wire:click="deleteServiceRentalPackage" type="button" wire:target="deleteServiceRentalPackage" class="right-0 inline-block w-8 h-8 rounded-full leading-loose bg-red-500 hover:bg-red-600 text-white font-semibold transition duration-200 text-sm" wire:loading.remove>
                                <i class="fa fa-trash bottom-px relative"></i>
                            </button>
                            <button wire:target="deleteServiceRentalPackage" type="button" class="right-0 inline-block w-8 h-8 rounded-full leading-loose bg-red-500 hover:bg-red-600 text-white font-semibold transition duration-200 text-sm" wire:loading disabled>
                                <i class="fa fa-spinner fa-spin"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </x-form>
    </div>
</div>