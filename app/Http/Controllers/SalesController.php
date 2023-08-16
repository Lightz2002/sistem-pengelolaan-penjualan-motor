<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminDataSalesRequest;
use App\Models\Sales;
use App\Http\Requests\StoreSurveyorSalesRequest;
use App\Http\Requests\UpdateSalesRequest;
use App\Models\Dealer;
use App\Services\SalesService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class SalesController extends Controller
{
    private $salesService;

    public function __construct(SalesService $salesService)
    {
        $this->salesService = $salesService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createAdminDataSales()
    {
        return view('sales.create-admin-data', [
            'dealers' => Dealer::all(),
            'defaultInstallmentType' => 'Motor Installment'
        ]);
    }

    public function indexCustomers()
    {
        return view('sales.list-customer');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function storeAdminDataSales(StoreAdminDataSalesRequest $request): RedirectResponse
    {
        $this->salesService->saveAdminDataSales($request);
        session()->flash('message', 'Customer Added Successfully');
        return Redirect::to('/customers');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeSurveyorSales(StoreSurveyorSalesRequest $request, Sales $sales): RedirectResponse
    {
        $this->salesService->saveSurveyorSales($request, $sales);
        session()->flash('message', 'Customer Edited Successfully');
        return Redirect::to('/customers');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function rejectSurveyorSales(Sales $sales): RedirectResponse
    {
        $this->salesService->rejectSurveyorSales($sales);
        session()->flash('message', 'Customer Edited Successfully');
        return Redirect::to('/customers');
    }


    /**
     * Display the specified resource.
     */
    public function showCustomer(Sales $sales)
    {
        return view('sales.show-customer', ['sales' => $sales]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editCustomer(Sales $sales)
    {
        return view('sales.edit-customer', [
            'sales' => $sales,
            'dealers' => Dealer::all(),
            'defaultInstallmentType' => 'Motor Installment'

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSalesRequest $request, Sales $sales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sales $sales)
    {
        //
    }
}
