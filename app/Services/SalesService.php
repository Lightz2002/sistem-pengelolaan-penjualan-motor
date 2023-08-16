<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreAdminDataSalesRequest;
use App\Http\Requests\StoreSurveyorSalesRequest;
use App\Models\Sales;


class SalesService
{
  private $fileService;

  public function __construct(FileService $fileService)
  {
    $this->fileService = $fileService;
  }
  public function saveAdminDataSales(StoreAdminDataSalesRequest $request): void
  {
    $sales = new Sales();
    $sales->fill($request->validated());
    $sales->sales_status = 'pending';
    $sales->sales_code = $sales->generateSalesCode();
    $sales->save();
  }

  public function rejectSurveyorSales(Sales $sales): void
  {
    $sales->sales_status = 'reject';
    $sales->save();
  }

  public function saveSurveyorSales(StoreSurveyorSalesRequest $request, Sales $sales): void
  {
    /* update sales pnya data dgn request */
    $sales->fill($request->validated());

    /* Upload photos */
    $this->fileService->multiUpload(['motor_front_photo', 'motor_back_photo', 'motor_right_photo', 'motor_left_photo', 'house_photo', 'customer_photo'], $sales);

    $sales->save();

  }
}
