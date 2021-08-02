<div class="w-full md:h-auto">
    <section class="relative bg-gray-900 pb-20 h-full">
        <img class="hidden lg:block lg:absolute top-0 left-0 mt-32" src="{{ asset('img/assets/icons/dots/yellow-dot-left-bars.svg') }}" alt="">
        <img class="hidden lg:block lg:absolute bottom-0 right-0 mt-20" src="{{ asset('img/assets/icons/dots/red-dot-right-shield.svg') }}" alt="">
        
        <div class="relative container pt-12 px-4 mb-20 mx-auto text-center flex flex-col h-full justify-center items-center">
            <h2 class="mt-8 mb-8 lg:mb-12 text-white text-4xl lg:text-6xl font-semibold">
                Take care of your performance every day.
            </h2>
            <div class="flex w-full justify-center">
                <select class="mr-4 text-center p-4 text-xs font-semibold leading-none bg-gray-50 rounded outline-none dark:bg-gray-700 dark:text-gray-300 lg:w-1/12" wire:model="currentFence" wire:change="loadServices()" value="{{ $currentFence }}">
                    <option hidden>City <i class="fa fa-angle-down"></i></option>
                    @foreach ($geoFences as $geoFence)
                        <option selected="{{ ((int)$currentFence === $geoFence->id) ? 'selected' : '' }}" class="text-sm" value="{{ $geoFence->id }}">{{ $geoFence->city_name }}</option>
                    @endforeach
                </select>
                <input type="text" class="text-center appearance-none p-4 text-xs font-semibold leading-none bg-gray-50 rounded outline-none dark:bg-gray-700 dark:text-gray-300 w-1/2" placeholder="Search For Services">
            </div>
        </div>
    </section>

    {{-- Overlay --}}
    <section class="bg-cover shadow-xl my-4 mx-auto relative hidden md:block lg:absolute inset-x-0" style="z-index: 24; top: 50%; width: fit-content;">
        <div class="py-20 flex relative">
            <div class="absolute inset-0 bg-white"></div>
            <div class="z-10 w-full px-8 md:px-24 text-center">
                <div class="flex flex-wrap align-center -mx-4 justify-around">
                    @forelse($services as $service)
                        <div class="px-8 mb-6">
                            <a href="{{ route('geoFenceServices',[$currentFence,$service->id]) }}">
                                <div class="focus:outline-none w-20 h-20 bg-center bg-cover mx-auto border-gray-50 cursor-pointer" style="background-image: url('{{ asset('storage/'.$service->image) }}')">
                                </div>
                                <div class="whitespace-nowrap text-center text-sm pt-2 font-heading text-gray-700 cursor-pointer">
                                    {{ $service->name }}
                                </div>
                            </a>
                        </div>
                    @empty
                        {{ __('crud.general.not_found') }}
                    @endforelse
                </div>
            </div>
        </div>
    </section>
</div>
