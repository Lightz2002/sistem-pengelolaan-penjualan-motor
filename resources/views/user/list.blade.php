<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>

    {{-- @include('partials.list-table') --}}
    <!-- List View -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h3 class="mb-4 text-lg font-bold">Users List</h3>

                <!-- List Navbar -->
                <div class="mb-4 flex items-baseline justify-evenly">
                    <x-search-bar></x-search-bar>
                    <x-redirect-button class="ml-auto" href="/users/create">Create</x-redirect-button>

                </div>

                <!-- Table -->
                <x-table :headers="$headers" :datas="$users"></x-table>

                {{-- Pagination --}}
                {{ $users->links() }}
            </div>
        </div>

    </div>

</x-app-layout>
