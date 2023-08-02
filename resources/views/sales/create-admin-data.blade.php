<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Sales') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @include('sales.partials.admin-data.create-sales-form')
    </div>
</x-app-layout>
