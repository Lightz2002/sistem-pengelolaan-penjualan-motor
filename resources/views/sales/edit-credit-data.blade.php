<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Create Customer') }}
      </h2>
  </x-slot>

  <div class="py-12">
      @include('sales.partials.cashier.edit-sales-form')
  </div>
</x-app-layout>
