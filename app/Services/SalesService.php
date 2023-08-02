<?php

namespace App\Services;

use App\Http\Requests\StoreAdminDataSalesRequest;
use App\Models\Sales;


class SalesService
{
  public function saveAdminDataSales(StoreAdminDataSalesRequest $adminDataSalesRequest): void
  {
    $sales = new Sales();
    $sales->fill($adminDataSalesRequest->validated());
    $sales->sales_status = 'pending';
    $sales->save();
  }

  public function saveSurveyorCustomer(): void
  {
    //
  }
}
