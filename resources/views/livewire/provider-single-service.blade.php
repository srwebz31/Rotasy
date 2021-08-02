<tr class="text-gray-700 dark:text-gray-400">
    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{ $index }}</td>
    
    <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3 text-sm">
        {{ $service->name }}
    </td>

    <td class="text-center">
        <input type="text" wire:model.defer="service_number" class="md:w-2/3 w-full appearance-none p-2 my-2 text-xs font-semibold leading-none rounded outline-none bg-gray-50 dark:bg-gray-700 dark:text-gray-300" placeholder="Enter {{ __('crud.inputs.number_plate') }}">
    </td>

    <td class="text-center">
        <input type="text" wire:model.defer="service_model" class="md:w-2/3 w-full appearance-none p-2 my-2 text-xs font-semibold leading-none rounded outline-none bg-gray-50 dark:bg-gray-700 dark:text-gray-300" placeholder="Enter {{ __('crud.inputs.model') }}">
    </td>

    <td>
        <div class="flex items-center justify-center">
            <button wire:loading.remove wire:target="updateProviderDetails" type="submit" wire:click="updateProviderDetails()" class="bg-green-400 text-white rounded-full flex w-8 h-8 justify-center items-center hover:bg-green-500 mx-1">
                <i class="fa fa-check"></i>
            </button>
            <button type="button" class="bg-green-400 text-white rounded-full flex w-8 h-8 justify-center items-center hover:bg-green-500 mx-1" wire:loading wire:target="updateProviderDetails">
                <i class="fa fa-spinner fa-spin"></i>
            </button>

            <button type="submit" wire:click="removeService()"
                class="bg-red-400 text-white rounded-full flex w-8 h-8 justify-center items-center hover:bg-red-500 mx-1" wire:loading.remove wire:target="removeService">
                <i wire:loading.remove wire:target="removeService" class="fa fa-trash"></i>
            </button>
            <button type="button" class="bg-red-400 text-white rounded-full flex w-8 h-8 justify-center items-center hover:bg-red-500 mx-1" wire:loading wire:target="removeService">
                <i class="fa fa-spinner fa-spin"></i>
            </button>
        </div>
    </td>
</tr>