<!-- Desktop sidebar -->
<aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
    <div class="fixed py-4 text-gray-500 dark:text-gray-400 overflow-hidden h-screen" style="width: inherit">
        <div class="flex flex-row pl-4">
            <img class="h-8" src="{{ url('storage/'.config('constants.site_logo')) }}" alt="" width="">
            <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="{{ route('admin.home') }}">
                {{ config('constants.site_title') }}
            </a>
        </div>
        <ul class="mt-6 overflow-scroll h-full pb-6">
            {{-- Dashboard Link --}}
            {{-- <h2 class="text-sm font-semibold dark:text-gray-100 px-6 mt-3 mb-2">
                General
            </h2> --}}

            {{-- Dashboard --}}
            <x-nav.navlink :active="request()->routeIs(['agent.home'])" :href="route('agent.home')" icon="home">{{ __('crud.navlinks.dashboard') }}</x-nav.navlink>

            {{-- Map --}}
            <x-nav.navlink :active="request()->routeIs(['agent.map.index'])" :href="route('agent.map.index')" icon="globe">{{ __('crud.admin.maps.name') }}</x-nav.navlink>

            {{-- Provider --}}
            <x-nav.droplist title="{{ __('crud.admin.providers.name') }}" href="toggleProvidersMenu" icon="bicycle" :active="request()->routeIs(['agent.provider.*'])">
                <x-nav.droplink href="{{ route('agent.provider.index') }}">
                    {{ __('crud.admin.providers.index') }}
                </x-nav.droplink>
                <x-nav.droplink href="{{ route('agent.provider.create') }}">
                    {{ __('crud.admin.providers.create') }}
                </x-nav.droplink>
            </x-nav.droplist>

            {{-- Provider Rating --}}
            <x-nav.navlink :active="request()->routeIs(['agent.provider_ratings'])" :href="route('agent.provider_ratings')" icon="star">{{ __('crud.admin.ratings.provider') }}</x-nav.navlink>

            {{-- Request History --}}
            <x-nav.navlink :active="request()->routeIs(['agent.requests.index'])" :href="route('agent.requests.index')" icon="history">{{ __('crud.navlinks.request') }} {{ __('crud.navlinks.history') }}</x-nav.navlink>

            {{-- Statements --}}
            <x-nav.droplist title="{{ __('crud.admin.statements.name') }}" href="toggleGeoFencesMenu" icon="tasks" :active="request()->routeIs(['agent.ride.statement', 'agent.ride.statement.*'])">
                <x-nav.droplink href="{{ route('agent.ride.statement') }}">
                    {{ __('crud.admin.statements.overall') }}
                </x-nav.droplink>
                <x-nav.droplink href="{{ route('agent.ride.statement.provider') }}">
                    {{ __('crud.admin.providers.name') }} {{ __('crud.admin.statements.name') }}
                </x-nav.droplink>
            </x-nav.droplist>
            
            {{-- Scheduled Rides --}}
            <x-nav.navlink :active="request()->routeIs(['agent.requests.scheduled'])" :href="route('agent.requests.scheduled')" icon="clock-o">{{ __('crud.general.scheduled_rides') }}</x-nav.navlink>
        </ul>
    </div>
</aside>

<!-- Mobile sidebar -->
<!-- Backdrop -->
<div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
</div>

<!-- Mobile Navigation  -->
<aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
    x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu"
    @keydown.escape="closeSideMenu">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <div class="flex flex-wrap justify-center py-5">
            <img class="h-8" src="{{ url('storage/'.config('constants.site_logo')) }}" alt="" width="">
            <a class="ml-1 text-lg font-bold text-gray-800 dark:text-gray-200" href="{{ route('admin.home') }}">
                {{ config('constants.site_title') }} 
            </a>
        </div>
        <ul class="mt-2">
            {{-- Dashboard Link --}}

            {{-- Dashboard --}}
            <x-nav.navlink :active="request()->routeIs(['agent.home'])" :href="route('agent.home')" icon="home">{{ __('crud.navlinks.dashboard') }}</x-nav.navlink>

            {{-- Map --}}
            <x-nav.navlink :active="request()->routeIs(['agent.map.index'])" :href="route('agent.map.index')" icon="globe">{{ __('crud.admin.maps.name') }}</x-nav.navlink>

            {{-- Provider --}}
            <x-nav.droplist title="{{ __('crud.admin.providers.name') }}" href="toggleProvidersMenu" icon="bicycle" :active="request()->routeIs(['agent.provider.*'])">
                <x-nav.droplink href="{{ route('agent.provider.index') }}">
                    {{ __('crud.admin.providers.index') }}
                </x-nav.droplink>
                <x-nav.droplink href="{{ route('agent.provider.create') }}">
                    {{ __('crud.admin.providers.create') }}
                </x-nav.droplink>
            </x-nav.droplist>

            {{-- Provider Rating --}}
            <x-nav.navlink :active="request()->routeIs(['agent.provider_ratings'])" :href="route('agent.provider_ratings')" icon="star">{{ __('crud.admin.ratings.provider') }}</x-nav.navlink>

            {{-- Request History --}}
            <x-nav.navlink :active="request()->routeIs(['agent.requests.index'])" :href="route('agent.requests.index')" icon="history">{{ __('crud.navlinks.request') }} {{ __('crud.navlinks.history') }}</x-nav.navlink>

            {{-- Statements --}}
            <x-nav.droplist title="{{ __('crud.admin.statements.name') }}" href="toggleGeoFencesMenu" icon="tasks" :active="request()->routeIs(['agent.ride.statement.*'])">
                <x-nav.droplink href="{{ route('agent.ride.statement') }}">
                    {{ __('crud.admin.statements.overall') }}
                </x-nav.droplink>
                <x-nav.droplink href="{{ route('agent.ride.statement.provider') }}">
                    {{ __('crud.admin.providers.name') }} {{ __('crud.admin.statements.name') }}
                </x-nav.droplink>
            </x-nav.droplist>
            
            {{-- Scheduled Rides --}}
            <x-nav.navlink :active="request()->routeIs(['agent.requests.scheduled'])" :href="route('agent.requests.scheduled')" icon="clock-o">{{ __('crud.general.scheduled_rides') }}</x-nav.navlink>
        </ul>
    </div>
</aside>