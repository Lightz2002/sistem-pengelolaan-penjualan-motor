<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSalesInstallmentRequest;
use App\Models\Sales;
use App\Models\SalesInstallment;
use App\Services\SalesInstallmentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SalesInstallmentController extends Controller
{
    private $salesInstallmentService;
    public function __construct(SalesInstallmentService $salesInstallmentService) {
        $this->salesInstallmentService = $salesInstallmentService;
    }

    public function list()
    {
        return view('salesinstallment.list');
    }

    public function create(Sales $sales) {

        return view('salesinstallment.create', [
            'sales' => $sales,
            'additionalDatas' => $this->salesInstallmentService->getHelperData($sales)
        ]);
    }

    public function store(StoreSalesInstallmentRequest $storeSalesInstallmentRequest, Sales $sales) {
        $this->salesInstallmentService->save($storeSalesInstallmentRequest, $sales);
        session()->flash('message', 'Installment Added Successfully');
        return Redirect::to(route('sales.showCreditSales', ['sales' => $sales->id]));
    }

    public function edit(SalesInstallment $salesinstallment) {

        return view('salesinstallment.edit', [
            'sales' => $salesinstallment->sales,
            'salesInstallment' => $salesinstallment,
        ]);
    }

    public function update(StoreSalesInstallmentRequest $storeSalesInstallmentRequest, SalesInstallment $salesinstallment) {
        $this->salesInstallmentService->update($storeSalesInstallmentRequest, $salesinstallment);
        session()->flash('message', 'Installment Updated Successfully');
        return Redirect::to(route('sales.showCreditSales', ['sales' => $salesinstallment->sales->id]));
    }
}
