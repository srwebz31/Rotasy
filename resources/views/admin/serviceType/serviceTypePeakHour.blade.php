<div class="w-full rounded-lg bg-white dark:text-gray-400 dark:bg-gray-800 mb-5">
    <div class="w-full px-5 py-5">
        @forelse ($peakHours as $ph)

            @php
                $key = $serviceType->id."_".$ph->id;
            @endphp
            <livewire:service-type-peak-hour :ph="$ph" :key="$key" :serviceType="$serviceType">

            @if (!$loop->last)
                <hr class="w-full my-4 border-gray-200 dark:border-gray-600" />
            @endif
        @empty
            
        @endforelse
    </div>
</div>