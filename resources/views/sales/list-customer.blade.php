<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer') }}
        </h2>
        <x-alert type="success"></x-alert>
    </x-slot>

    {{-- @include('partials.list-table') --}}
    <!-- List View -->
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h3 class="mb-4 text-lg font-bold">Customers List</h3>

                <!-- List Navbar -->
                <livewire:customers-table />

            </div>
        </div>

    </div>
</x-app-layout>

