<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer') }}
        </h2>
    </x-slot>

    <!-- List View -->
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h1 class="mb-6 text-4xl font-bold">{{ $sales->customer_name }}</h1>

                @include('sales.partials.admin-data.show-customer-table')
            </div>
        </div>

    </div>
</x-app-layout>
