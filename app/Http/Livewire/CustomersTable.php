<?php

namespace App\Http\Livewire;

use App\Models\Sales;
use App\View\Components\Column;
use Illuminate\Database\Eloquent\Builder;

class CustomersTable extends Table
{
    public $search = '';

    public $createUrl = '/customers/createAdminData';

    public function query(): Builder
    {
        return Sales::filterByCustomer($this->search);
    }

    public function columns(): array
    {
        return [
            Column::make('sales_code', 'Sales Code'),
            Column::make('customer_name', 'Name'),
            Column::make('customer_full_address', 'Address'),
            Column::make('motor_plate_number', 'Plate Number'),
            Column::make('sales_status', 'Status')->component('columns.customers.status'),
            Column::make('created_at', 'Created At')->component('columns.common.human-diff'),
            Column::make('action', 'Actions')->component('columns.customers.action')
        ];
    }
}
