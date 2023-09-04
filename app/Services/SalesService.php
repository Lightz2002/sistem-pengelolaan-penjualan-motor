<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreAdminDataSalesRequest;
use App\Http\Requests\StoreCashSalesRequest;
use App\Http\Requests\StoreSurveyorSalesRequest;
use App\Http\Requests\UpdateCreditSalesRequest;
use App\Models\Sales;
use Nasution\Terbilang;


class SalesService
{
  private $fileService;
  private $salesInstallmentService;

  public function __construct(FileService $fileService,  SalesInstallmentService $salesInstallmentService)
  {
    $this->fileService = $fileService;
    $this->salesInstallmentService = $salesInstallmentService;
  }

  public function getDashboardData() {
    $customers = Sales::all();

    $surveyData = Sales::where('sales_status', 'pending')->get();

    $creditSales = Sales::filterByCredit('')->get();

    $cashSales = Sales::where('sales_type', 'cash')
    ->where('sales_status', 'accepted')
    ->get();

    $installments = $this->salesInstallmentService->getAll();

    $data = (object) [
      'customers' => $customers->count(),
      'surveyData' => $surveyData->count(),
      'creditSales' => $creditSales->count(),
      'cashSales' => $cashSales->count(),
      'installments' => $installments->count(),
    ];

    return $data;
  }
  public function saveAdminDataSales(StoreAdminDataSalesRequest $request): void
  {
    $sales = new Sales();
    $sales->fill($request->validated());
    $sales->sales_status = 'pending';
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

    $sales->sales_surveyor = auth()->user()->id;
    $sales->save();

  }

  public function updateCreditSales(UpdateCreditSalesRequest $request, Sales $sales): void
  {
    /* update sales pnya data dgn request */
    $sales->fill($request->validated());
    $sales->sales_code = $sales->generateSalesCode();
    $sales->is_finish_edited = true;

    $sales->save();
  }

  public function saveCashSales(StoreCashSalesRequest $request): void
  {
    $sales = new Sales();
    $sales->fill($request->validated());
    $sales->sales_type = 'cash';
    $sales->sales_status = 'accepted';
    $sales->is_finish_edited = true;
    $sales->save();
  }

  public function updateStatus(Sales $sales): void
  {
    $sales->sales_status = request()->sales_status;
    $sales->save();
  }

  public function print(Sales $sales) {
    $data = $sales;
    $data->view = 'pdf.invoice';
    $data->total_installment_amount = $data->motor_installment_amount * $data->motor_installment_period;
    $data->total_payment = $data->total_installment_amount + $data->motor_dp;
    $data->motor_dp_words = ucwords(Terbilang::convert(intval($data->motor_dp)) . ' rupiah');

    if ($sales->sales_type === 'cash') {
      $data->total_payment = $data->motor_price;
      $data->motor_dp_words = ucwords(Terbilang::convert(intval($data->motor_price)) . ' rupiah');
      $data->total_installment_amount = $data->motor_price;;
      $data->motor_dp = $data->motor_price;;

    }

    return $this->fileService->generatePdf(['data' => $data]);
  }
}
