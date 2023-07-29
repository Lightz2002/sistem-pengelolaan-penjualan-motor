<x-nav-link :href="route('users')" :active="request()->is('users*')">
    {{ __('User') }}
</x-nav-link>
