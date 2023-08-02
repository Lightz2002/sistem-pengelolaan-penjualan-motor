<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminDataSalesRequest;
use App\Models\Sales;
use App\Http\Requests\StoreSalesRequest;
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

    public function showCustomers()
    {
        return view('sales.list-customer', [
            'headers' => ['Sales Code', 'Name', 'Address', 'Plate Number'],
            'properties' => ['sales_code', 'customer_name', 'customer_full_address', 'customer_plate_number'],
            'datas' => Sales::all()
        ]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function storeAdminDataSales(StoreAdminDataSalesRequest $request): RedirectResponse
    {
        $this->salesService->saveAdminDataSales($request);
        return Redirect::to('/sales/createAdminData');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sales $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sales $sales)
    {
        //
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
