<x-nav-link :href="route('developer.index')" :active="request()->routeIs('developer.*')">
    {{ __('Kelola Developer') }}
</x-nav-link>