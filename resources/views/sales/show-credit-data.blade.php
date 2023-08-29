<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Show Credit Sales') }}
      </h2>
      <x-alert type="success"></x-alert>
  </x-slot>

  <div class="py-12">
      @include('sales.partials.cashier.show-sales-form')
  </div>
</x-app-layout>
