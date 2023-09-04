<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Create Cash Sales') }}
      </h2>
  </x-slot>

  <div class="py-12">
      @include('cashsales.partials.create-cash-sales-form')
  </div>
</x-app-layout>
