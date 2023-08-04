<?php

namespace App\Http\Livewire;

use App\Models\Sales;
use App\View\Components\Column;
use Illuminate\Database\Eloquent\Builder;

class CustomerSalesHistoryTable extends Table
{
    public $search = '';

    public $createUrl = '';

    public function query(): Builder
    {
        return Sales::filterByCustomer($this->search);
    }

    public function columns(): array
    {
        return [
            Column::make('sales_date', 'Sales Date'),
            Column::make('sales_code', 'Name'),
            Column::make('motor_plate_number', 'Plate Number'),
            Column::make('action', 'Actions')->component('columns.customers.action')
        ];
    }
}
