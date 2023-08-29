<x-nav-link :href="route('sales.listCreditSales')" :active="request()->routeIs('sales.*')">
  {{ __('Sales') }}
</x-nav-link>

<x-nav-link :href="route('salesinstallment.list')" :active="request()->routeIs('salesinstallment*')">
  {{ __('Sales Installment') }}
</x-nav-link>
