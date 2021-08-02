<div class="w-full rounded-lg bg-white dark:text-gray-400 dark:bg-gray-800 mb-5">
    <div class="w-full px-5 py-5">
        @forelse ($geoFences as $gf)

        @php
        $key = $serviceType->id."_".$gf->id;
        @endphp
        <livewire:service-geo-fence :gf="$gf" :serviceType="$serviceType" :key="$key">

            @if (!$loop->last)
            <hr class="w-full my-4 border-gray-200 dark:border-gray-600" />
            @endif
            @empty

            @endforelse
    </div>
</div>