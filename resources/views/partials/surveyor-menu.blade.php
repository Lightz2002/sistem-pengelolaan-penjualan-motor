<x-nav-link :href="route('customers')" :active="request()->routeIs('customers*')">
    {{ __('Customers') }}
</x-nav-link>
