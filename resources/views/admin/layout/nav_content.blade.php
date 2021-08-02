
{{-- Dashboard Link --}}

@role('super-admin')
<h2 class="text-sm font-semibold dark:text-gray-100 px-6 mt-3 mb-2">
    General
</h2>

<x-nav.navlink :active="request()->routeIs(['admin.home'])" :href="route('admin.home')" icon="home">
    {{ __('crud.navlinks.dashboard') }}</x-nav.navlink>
@endrole

    <x-nav.navlink :active="request()->routeIs(['admin.dispatcherDashboard'])"
        :href="route('admin.dispatcherDashboard')" icon="dashboard">
        {{ __('crud.dispatcher.dispatcher_dashboard') }}
        @if (config('constants.manual_request') == '1')
            : Manual
        @else
            : Auto
        @endif
    </x-nav.navlink>

@can('list notifications')
    <x-nav.droplist title="{{ __('crud.admin.notifications.name') }}" href="toggleNotificationsMenu" icon="bell"
        :active="request()->routeIs(['admin.notification.*'])">
        <x-nav.droplink href="{{ route('admin.notification.index') }}">
            {{ __('crud.admin.notifications.index') }}</x-nav.droplink>
        <x-nav.droplink href="{{ route('admin.notification.create') }}">
            {{ __('crud.admin.notifications.create') }}</x-nav.droplink>
    </x-nav.droplist>
@endcan

@can('list customPushes')
    <x-nav.droplist title="{{ __('crud.admin.customPushes.name') }}" href="toggleCustomPushesMenu"
        icon="thumb-tack" :active="request()->routeIs(['admin.customPush.*'])">
        <x-nav.droplink href="{{ route('admin.customPush.index') }}">{{ __('crud.admin.customPushes.index') }}
        </x-nav.droplink>
        <x-nav.droplink href="{{ route('admin.customPush.create') }}">{{ __('crud.admin.customPushes.create') }}
        </x-nav.droplink>
    </x-nav.droplist>
@endcan

{{-- Heading Authorization --}}
@if(Auth::user()->can('list geoFences') || Auth::user()->can('view maps'))
    <hr class="dark:border-gray-700 mt-2">
    <h2 class="text-sm font-semibold dark:text-gray-100 px-6 mt-3 mb-2">
        Maps
    </h2>
@endif

{{-- GeoFence Menu --}}
@can('list geoFences')
    <x-nav.droplist title="{{ __('crud.admin.geoFencings.name') }}" href="toggleGeoFencesMenu" icon="map-marker"
        :active="request()->routeIs(['admin.geoFencing.*'])">
        <x-nav.droplink href="{{ route('admin.geoFencing.index') }}">{{ __('crud.admin.geoFencings.index') }}
        </x-nav.droplink>
        <x-nav.droplink href="{{ route('admin.geoFencing.create') }}">{{ __('crud.admin.geoFencings.create') }}
        </x-nav.droplink>
    </x-nav.droplist>
@endcan

@can('view maps')
<x-nav.droplist title="{{ __('crud.admin.maps.name') }}" href="toggleMapsMenu" icon="globe"
    :active="request()->routeIs(['admin.map.*'])">
    <x-nav.droplink href="{{ route('admin.map.index') }}">{{ __('crud.admin.maps.index') }}</x-nav.droplink>
    <x-nav.droplink href="{{ route('admin.map.heatMap') }}">{{ __('crud.admin.maps.heatMap') }}
    </x-nav.droplink>
</x-nav.droplist>
@endcan


@if(Auth::user()->can('list users') || Auth::user()->can('list admins') || Auth::user()->can('list
providers') || Auth::user()->can('list agents') || Auth::user()->can('list roles') ||
Auth::user()->can('list permissions'))
<hr class="dark:border-gray-700 mt-2">
<h2 class="text-sm font-semibold dark:text-gray-100 px-6 mt-3 mb-2">
    Members
</h2>
@endif

{{-- User Menu --}}
@can('list users')
<x-nav.droplist title="{{ __('crud.admin.users.name') }}" href="toggleUsersMenu" icon="users"
    :active="request()->routeIs(['admin.user.*'])">
    <x-nav.droplink href="{{ route('admin.user.index') }}">{{ __('crud.admin.users.index') }}
    </x-nav.droplink>
    <x-nav.droplink href="{{ route('admin.user.create') }}">{{ __('crud.admin.users.create') }}
    </x-nav.droplink>
</x-nav.droplist>
@endcan

{{-- Admins Menu --}}
@can('list admins')
<x-nav.droplist title="{{ __('crud.admin.admins.name') }}" href="toggleAdminsMenu" icon="user-plus"
    :active="request()->routeIs(['admin.admin.*'])">
    <x-nav.droplink href="{{ route('admin.admin.index') }}">{{ __('crud.admin.admins.index') }}
    </x-nav.droplink>
    <x-nav.droplink href="{{ route('admin.admin.create') }}">{{ __('crud.admin.admins.create') }}
    </x-nav.droplink>
</x-nav.droplist>
@endcan

{{-- Providers Menu --}}
@can('list providers')
<x-nav.droplist title="{{ __('crud.admin.providers.name') }}" href="toggleProvidersMenu" icon="users"
    :active="request()->routeIs(['admin.provider.*'])">
    <x-nav.droplink href="{{ route('admin.provider.index') }}">{{ __('crud.admin.providers.index') }}
    </x-nav.droplink>
    <x-nav.droplink href="{{ route('admin.provider.create') }}">{{ __('crud.admin.providers.create') }}
    </x-nav.droplink>
</x-nav.droplist>
@endcan

{{-- Agents Menu --}}
@can('list agents')
<x-nav.droplist title="{{ __('crud.admin.agents.name') }}" href="toggleAgentsMenu" icon="user-plus"
    :active="request()->routeIs(['admin.agent.*'])">
    <x-nav.droplink href="{{ route('admin.agent.index') }}">{{ __('crud.admin.agents.index') }}
    </x-nav.droplink>
    <x-nav.droplink href="{{ route('admin.agent.create') }}">{{ __('crud.admin.agents.create') }}
    </x-nav.droplink>
</x-nav.droplist>
@endcan

{{-- Roles Menu --}}
@can('list roles')
<x-nav.droplist title="{{ __('crud.admin.roles.name') }}" href="toggleRoleMenu" icon="users"
    :active="request()->routeIs(['admin.role.*'])">
    <x-nav.droplink href="{{ route('admin.role.index') }}">{{ __('crud.admin.roles.index') }}
    </x-nav.droplink>
    <x-nav.droplink href="{{ route('admin.role.create') }}">{{ __('crud.admin.roles.create') }}
    </x-nav.droplink>
</x-nav.droplist>
@endcan

{{-- Permissions Menu --}}
@can('list permissions')
<x-nav.droplist title="{{ __('crud.admin.permissions.name') }}" href="togglePermissionMenu" icon="lock"
    :active="request()->routeIs(['admin.permission.*'])">
    <x-nav.droplink href="{{ route('admin.permission.index') }}">{{ __('crud.admin.permissions.index') }}
    </x-nav.droplink>
    <x-nav.droplink href="{{ route('admin.permission.create') }}">{{ __('crud.admin.permissions.create') }}
    </x-nav.droplink>
</x-nav.droplist>
@endcan

{{-- Heading Authorization --}}
@if(Auth::user()->can('list promocodes'))
<hr class="dark:border-gray-700 mt-2">
<h2 class="text-sm font-semibold dark:text-gray-100 px-6 mt-3 mb-2">
    Offers
</h2>
@endif

@can('list promocodes')
<x-nav.droplist title="{{ __('crud.admin.promocodes.name') }}" href="togglePromocodesMenu" icon="gift"
    :active="request()->routeIs(['admin.promocode.*'])">
    <x-nav.droplink href="{{ route('admin.promocode.index') }}">{{ __('crud.admin.promocodes.index') }}
    </x-nav.droplink>
    <x-nav.droplink href="{{ route('admin.promocode.create') }}">{{ __('crud.admin.promocodes.create') }}
    </x-nav.droplink>
</x-nav.droplist>
@endcan

{{-- Heading Authorization --}}
@if(Auth::user()->can('list settlements'))
<hr class="dark:border-gray-700 mt-2">
<h2 class="text-sm font-semibold dark:text-gray-100 px-6 mt-3 mb-2">
    Accounts
</h2>
@endif

@can('view settlements')
<x-nav.droplist title="{{ __('crud.admin.statements.name') }}" href="toggleStatementsMenu" icon="tasks"
    :active="request()->routeIs(['admin.statement.*'])">
    <x-nav.droplink href="{{ route('admin.statement.overall') }}">{{ __('crud.admin.statements.overall') }}
    </x-nav.droplink>
    <x-nav.droplink href="{{ route('admin.statement.provider') }}">
        {{ __('crud.admin.statements.provider') }}</x-nav.droplink>
    <x-nav.droplink href="{{ route('admin.statement.user') }}">{{ __('crud.admin.statements.user') }}
    </x-nav.droplink>
    <x-nav.droplink href="{{ route('admin.statement.agent') }}">{{ __('crud.admin.statements.agent') }}
    </x-nav.droplink>
</x-nav.droplist>
@endcan

{{-- @can('view settlements')
    <x-nav.droplist title="{{ __('crud.navlinks.payment') }}" href="togglePaymentMenu" icon="dollar"
:active="request()->routeIs(['admin.payment.*'])">
<x-nav.droplink href="{{ route('admin.payment.history') }}">{{ __('crud.navlinks.payment') }}
    {{ __('crud.navlinks.history') }}</x-nav.droplink>
<x-nav.droplink href="{{ route('admin.payment.setting') }}">{{ __('crud.payment.name') }}
    {{ __('crud.navlinks.setting') }}</x-nav.droplink>
</x-nav.droplist>
@endcan --}}

@can('view settlements')
<x-nav.navlink :active="request()->routeIs(['admin.settlement.allTransaction'])"
    :href="route('admin.settlement.allTransaction')" icon="paper-plane">
    {{ __('crud.navlinks.transaction') }}</x-nav.navlink>
@endcan


@can('list settlemenets')
<x-nav.droplist title="{{ __('crud.admin.settlements.name') }}" href="toggleSettlementMenu"
    icon="handshake-o" :active="request()->routeIs(['admin.settlement.*'])">
    <x-nav.droplink href="{{ route('admin.settlement.index') }}">{{ __('crud.admin.settlements.name') }}
    </x-nav.droplink>
    <x-nav.droplink href="{{ route('admin.settlement.create') }}">{{ __('crud.admin.settlements.create') }}
    </x-nav.droplink>

</x-nav.droplist>
@endcan

{{-- Heading Authorization --}}
@if(Auth::user()->can('list serviceTypes') || Auth::user()->can('list documents') || Auth::user()->can('list
peakHours'))
<hr class="dark:border-gray-700 mt-2">
<h2 class="text-sm font-semibold dark:text-gray-100 px-6 mt-3 mb-2">
    Service
</h2>
@endif

{{-- Service Type Menu --}}
@can('list serviceTypes')
<x-nav.droplist title="{{ __('crud.admin.serviceTypes.name') }}" href="toggleServiceTypeMenu" icon="wrench"
    :active="request()->routeIs(['admin.serviceType.*', 'admin.subServices'])">
    <x-nav.droplink href="{{ route('admin.serviceType.index') }}">{{ __('crud.admin.serviceTypes.index') }}
    </x-nav.droplink>
    <x-nav.droplink href="{{ route('admin.serviceType.create') }}">
        {{ __('crud.admin.serviceTypes.create') }}</x-nav.droplink>
</x-nav.droplist>
@endcan

{{-- Document Menu --}}
@can('list documents')
<x-nav.droplist title="{{ __('crud.admin.documents.name') }}" href="toggleDocumentMenu" icon="file"
    :active="request()->routeIs(['admin.document.*'])">
    <x-nav.droplink href="{{ route('admin.document.index') }}">{{ __('crud.admin.documents.index') }}
    </x-nav.droplink>
    <x-nav.droplink href="{{ route('admin.document.create') }}">{{ __('crud.admin.documents.create') }}
    </x-nav.droplink>
</x-nav.droplist>
@endcan

{{-- Peak Hours --}}
@can('list peakHours')
<x-nav.droplist title="{{ __('crud.admin.peakHours.name') }}" href="togglePeakHoursMenu" icon="clock-o"
    :active="request()->routeIs(['admin.peakHour.*'])">
    <x-nav.droplink href="{{ route('admin.peakHour.index') }}">{{ __('crud.admin.peakHours.index') }}
    </x-nav.droplink>
    <x-nav.droplink href="{{ route('admin.peakHour.create') }}">{{ __('crud.admin.peakHours.create') }}
    </x-nav.droplink>
</x-nav.droplist>
@endcan

{{-- Heading Authorization --}}
@if(Auth::user()->can('view requestHistory') || Auth::user()->can('view ratings'))
<hr class="dark:border-gray-700 mt-2">
<h2 class="text-sm font-semibold dark:text-gray-100 px-6 mt-3 mb-2">
    Request & Ratings
</h2>
@endif

@can('view requestHistory')
<x-nav.navlink :active="request()->routeIs(['admin.request.*'])" :href="route('admin.request.history')"
    icon="paper-plane">{{ __('crud.navlinks.request') }} {{ __('crud.navlinks.history') }}</x-nav.navlink>
@endcan

@can('view ratings')
    <x-nav.navlink :active="request()->routeIs(['admin.ratings'])" :href="route('admin.ratings')" icon="star">{{ __('crud.admin.ratings.name') }}</x-nav.navlink>
@endcan

{{-- Heading Authorization --}}
@if(Auth::user()->can('list faqs') || Auth::user()->can('list disputeTypes') || Auth::user()->can('list
cancelReasons'))
<hr class="dark:border-gray-700 mt-2">
<h2 class="text-sm font-semibold dark:text-gray-100 px-6 mt-3 mb-2">
    User Support
</h2>
@endif

@can('list faqs')
<x-nav.droplist title="{{ __('crud.admin.faqs.name') }}" href="toggleFaqsMenu" icon="question-circle"
    :active="request()->routeIs(['admin.faq.*'])">
    <x-nav.droplink href="{{ route('admin.faq.index') }}">{{ __('crud.admin.faqs.index') }}</x-nav.droplink>
    <x-nav.droplink href="{{ route('admin.faq.create') }}">{{ __('crud.admin.faqs.create') }}
    </x-nav.droplink>
</x-nav.droplist>
@endcan

{{-- Dispute Menu --}}
@can('list disputeTypes')
<x-nav.droplist title="{{ __('crud.admin.disputes.panel') }}" href="toggleDisputeMenu" icon="gavel"
    :active="request()->routeIs(['admin.disputeType.*'])">
    <x-nav.droplink href="{{ route('admin.dispute.index') }}">{{ __('crud.admin.disputes.name') }}
    </x-nav.droplink>
    <x-nav.droplink href="{{ route('admin.disputeType.index') }}">{{ __('crud.admin.disputes.type.index') }}
    </x-nav.droplink>
    <x-nav.droplink href="{{ route('admin.disputeType.create') }}">
        {{ __('crud.admin.disputes.type.create') }}</x-nav.droplink>
</x-nav.droplist>
@endcan

{{-- Cancel Reason Menu --}}
@can('list cancelReasons')
    <x-nav.droplist title="{{ __('crud.admin.cancelReasons.name') }}" href="toggleCancelMenu" icon="ban"
        :active="request()->routeIs(['admin.cancelReason.*'])">
        <x-nav.droplink href="{{ route('admin.cancelReason.index') }}">
            {{ __('crud.admin.cancelReasons.index') }}</x-nav.droplink>
        <x-nav.droplink href="{{ route('admin.cancelReason.create') }}">
            {{ __('crud.admin.cancelReasons.create') }}</x-nav.droplink>
    </x-nav.droplist>
@endcan