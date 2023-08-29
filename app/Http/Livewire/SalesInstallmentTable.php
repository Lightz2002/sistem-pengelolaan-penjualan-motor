<?php

namespace App\Http\Livewire;

use App\Models\SalesInstallment;
use App\Models\User;
use App\View\Components\Column;
use Illuminate\Database\Eloquent\Builder;


class SalesInstallmentTable extends Table
{
    public $sales;
    public $search = '';

    public $createUrl = "";
    public $sortBy = 'sales_installments.period_no';
    public $sortDirection = 'asc';



    public function query(): Builder
    {
        return SalesInstallment::filter($this->search, $this->sales->id ?? 'all');
    }

    public function columns(): array
    {
        if ($this->sales) return [
            Column::make('code', 'Code'),
            Column::make('period_no', 'Period'),
            Column::make('receipt_date', 'Receipt Date'),
            Column::make('installment_amount', 'Installment'),
            Column::make('dealer_id', 'Dealer')->component('columns.cashiers.sales_installment_dealer'),
            Column::make('fine', 'Fine'),
            Column::make('discount_amount', 'Discount'),
            Column::make('total_payment', 'Total'),
            Column::make('action', 'Actions')->component('columns.cashiers.sales_installment_action'),
        ];

        return [
            Column::make('customer_name', 'Customer'),
            Column::make('customer_address', 'Address'),
            Column::make('motor_plate_number', 'Plate Number'),
            Column::make('sales_code', 'Sales Code'),
            Column::make('action', 'Actions')->component('columns.cashiers.sales_installment_action'),
        ];
    }
}
