
<div class="w-full rounded-lg shadow-xs bg-white dark:text-gray-400 dark:bg-gray-800 mb-5">
    <div class="w-full px-1 py-0">
        <div class="w-full rounded-lg bg-white dark:text-gray-400 dark:bg-gray-800 mb-5">
            <div class="w-full px-5 py-5">
                <livewire:service-rental :currentService="$serviceType">
            </div>
        </div>
    </div>
</div>

{{-- <div class="w-full rounded-lg shadow-xs bg-white dark:text-gray-400 dark:bg-gray-800 mb-5">
    <div class="w-full px-1 py-0">
        <div class="grid grid-cols-3 gap-4 justify-between">
            <div class="col-span-2">
                <h2 class="px-5 pt-5 text-2xl font-semibold dark:text-gray-400">Available Rental Packages</h2>
            </div>
            <div class="col-span-1"style="display: flex; align-items: flex-end; justify-content: flex-end;">
            </div>
        </div>
        <div class="w-full rounded-lg bg-white dark:text-gray-400 dark:bg-gray-800 mb-5">
            <div class="w-full px-5 py-5">
                <livewire:single-service-rental :packages="$serviceType->rentalRates">
            </div>
        </div>
    </div>
</div> --}}