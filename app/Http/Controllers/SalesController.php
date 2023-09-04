<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminDataSalesRequest;
use App\Http\Requests\StoreCashSalesRequest;
use App\Http\Requests\UpdateCreditSalesRequest;
use App\Models\Sales;
use App\Http\Requests\StoreSurveyorSalesRequest;
use App\Http\Requests\UpdateSalesRequest;
use App\Models\Dealer;
use App\Models\User;
use App\Services\SalesService;
use Illuminate\Http\JsonResponse;
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
     * Show the form for creating a new resource.
     */
    public function createAdminDataSales()
    {
        return view('sales.create-admin-data', [
            'dealers' => Dealer::all(),
            'surveyors' => User::role('surveyor')->get(),
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


    public function updateStatus(Sales $sales): JsonResponse
    {
        $this->salesService->updateStatus($sales);
        return response()->json([
            'message' => "Customer data " . request()->sales_status . " !"
        ]);
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

    public function showCashSales(Sales $sales)
    {
        return view('cashsales.show-cash-sales', [
            'sales' => $sales
        ]);
    }

    public function createCashSales()
    {
        $sales = new Sales();
        $sales->sales_type = 'cash';
        $defaultSalesCode = $sales->generateSalesCode();

        return view('cashsales.create-cash-sales', [
            'defaultSalesCode' => $defaultSalesCode
        ]);
    }

    public function storeCashSales(StoreCashSalesRequest $request): RedirectResponse
    {
        $this->salesService->saveCashSales($request);
        session()->flash('message', 'Sales Created Successfully');
        return Redirect::to('/customers');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function listCreditSales()
    {
        return view('sales.list-credit', [
            'dealers' => Dealer::all(),
            'defaultInstallmentType' => 'Motor Installment'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function showCreditSales(Sales $sales)
    {
        return view('sales.show-credit-data', [
            'dealers' => Dealer::all(),
            'defaultInstallmentType' => 'Motor Installment',
            'sales' => $sales
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function editCreditSales(Sales $sales)
    {
        return view('sales.edit-credit-data', [
            'dealers' => Dealer::all(),
            'defaultInstallmentType' => 'Motor Installment',
            'sales' => $sales
        ]);
    }

    public function updateCreditSales(UpdateCreditSalesRequest $request, Sales $sales): RedirectResponse
    {
        $this->salesService->updateCreditSales($request, $sales);
        session()->flash('message', 'Customer Edited Successfully');
        return Redirect::to('/sales');
    }

    public function print(Sales $sales)
    {
        return $this->salesService->print($sales);
    }

}
