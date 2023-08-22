<?php

namespace App\Http\Livewire;

use App\Models\Sales;
use App\View\Components\Column;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class CreditSalesTable extends Table
{
    public $search = '';

    public $createUrl = '';

    public function mount()
    {
    }

    public function query(): Builder
    {
        return Sales::filterByCredit($this->search);
    }

    public function columns(): array
    {
        return [
            Column::make('sales_code', 'Sales Code'),
            Column::make('sales_date', 'Date'),
            Column::make('customer_name', 'Name'),
            Column::make('motor_plate_number', 'Plate Number'),
            Column::make('dealer', 'Dealer')->component('columns.cashiers.dealer'),
            Column::make('created_at', 'Created At')->component('columns.common.human-diff'),
            Column::make('action', 'Actions')->component('columns.cashiers.action')
        ];
    }

}
