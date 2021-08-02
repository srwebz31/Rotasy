<div x-data={showAdd:false}>
    <div class="grid grid-cols-3 gap-4 justify-between">
        <div class="col-span-2">
            <h2 class="text-2xl font-semibold dark:text-gray-400">Rental Packages</h2>
        </div>
        <div class="col-span-1"style="display: flex; align-items: flex-end; justify-content: flex-end;">
            <button @click="showAdd = !showAdd" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                {{ __('crud.general.add') }} {{ __('crud.admin.serviceTypes.rental.name') }} {{ __('crud.inputs.for') }} {{ __('crud.admin.serviceTypes.name') }} 
                <i x-show="!showAdd" class="fa fa-angle-right"></i>
                <i x-show="showAdd" class="fa fa-angle-down"></i>
            </button>
        </div>
    </div>

    {{-- Components to add a rental package. --}}
    <form x-show.transition.origin.top.left="showAdd"  wire:submit.prevent="saveServiceRentalPackage" class="mt-3 w-full" method="post">
        <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
            <x-inputs.number :label="__('crud.admin.serviceTypes.rental.hour')" name="hour"
            value="" wire:model.defer="hour" :showError="1==1">
            </x-inputs.number>

            <x-inputs.number :label="__('crud.admin.serviceTypes.rental.km')" name="rental_km"
            value="" wire:model.defer="km" :showError="1==1">
            </x-inputs.number>

            <x-inputs.number :label="__('crud.admin.serviceTypes.rental.price')" name="rental_price"
            value="" wire:model.defer="price" :showError="1==1">
            </x-inputs.number>
            
            <br>
            <div class="mx-4 w-full items-end"style="display: flex; align-items: flex-end; justify-content: flex-end;">
                <button class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green" wire:loading.remove wire:target="saveServiceRentalPackage" type="submit">
                    {{ __('crud.general.create') }} {{ __('crud.admin.serviceTypes.rental.name') }} {{ __('crud.admin.serviceTypes.rental.package') }}
                </button>
                <button class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green" disabled wire:loading wire:target="saveServiceRentalPackage">
                    <i class="fa-spinner fa-pulse fa"></i> {{ __('crud.general.adding') }} {{ __('crud.admin.serviceTypes.rental.name') }} {{ __('crud.admin.serviceTypes.rental.package') }}
                </button>
            </div>
        </div>
    </form>
    
    <hr class="mt-4 mb-9 border-gray-600">

    @forelse ($currentService->rental_hour_package as $package)
        <livewire:single-service-rental :package="$package" :key="'pacakge'.$package->id">
    @empty
        <span class="dark:text-gray-400">
            No Existing Packages Found
        </span>
    @endforelse
</div>