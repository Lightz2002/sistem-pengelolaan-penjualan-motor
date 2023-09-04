<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreAdminDataSalesRequest;
use App\Http\Requests\StoreSalesInstallmentRequest;
use App\Http\Requests\StoreSurveyorSalesRequest;
use App\Http\Requests\UpdateCreditSalesRequest;
use App\Models\Sales;
use App\Models\SalesInstallment;
use Carbon\Carbon;

class SalesInstallmentService
{
  private function getLastPayment($salesId) {
    return SalesInstallment::where('sales_id', $salesId)->orderBy('period_no', 'Desc')->first();
  }
  private function getPeriodNo($salesId){
    $lastPayment = $this->getLastPayment($salesId);

    return $lastPayment ? $lastPayment->period_no + 1 : 1;
  }

  private function getDueDateByPeriod($sales, $period) {
    return Carbon::parse($sales->sales_date)->addMonths($period)->format('Y-m-d');
  }

  private function getLatePaymentDays($dueDate) {
    $dueDate = Carbon::parse($dueDate);
    $paymentDate = Carbon::now();

    return $paymentDate->greaterThan($dueDate) ? $paymentDate->diffInDays($dueDate) : 0;
  }

  private function getFine($sales, $latePaymentDays) {
    return (0.5 / 100) * $sales->motor_installment_amount * $latePaymentDays;
  }

  private function getPenaltyDebt($sales) {
    $lastPayment = $this->getLastPayment($sales->id);
    if (!$lastPayment) return 0;

    return $lastPayment->penalty_debt - $lastPayment->paid_fine;
  }

  public function countTotalPayment(SalesInstallment $salesInstallment) {
    return $salesInstallment->installment_amount + $salesInstallment->paid_fine - $salesInstallment->discount_amount;
  }


  public function getAll() {
    return SalesInstallment::all();
  }

  public function getHelperData($sales) {
    $paymentPeriod = $this->getPeriodNo($sales->id);
    $dueDate = $this->getDueDateByPeriod($sales, $paymentPeriod);
    $latePaymentDays = $this->getLatePaymentDays($dueDate);
    $tmp = new SalesInstallment();
    $tmp->sales = $sales;

    return (object) [
      'code' => $tmp->generateCode(),
      'receipt_date' => Carbon::now()->format('Y-m-d'),
      'due_date' => $dueDate,
      'late_payment_days' => $latePaymentDays,
      'period_no' => $paymentPeriod,
      'period_left' => $sales->motor_installment_period - $paymentPeriod,
      'fine' => $this->getFine($sales, $latePaymentDays),
      'penalty_debt' => $this->getPenaltyDebt($sales),
    ];
  }

  public function save(StoreSalesInstallmentRequest $storeSalesInstallmentRequest, Sales $sales) {
    /* update sales pnya data dgn request */
    $salesInstallment = new SalesInstallment();
    $salesInstallment->fill($storeSalesInstallmentRequest->validated());

    $salesInstallment->sales_id = $sales->id;
    $salesInstallment->total_payment = $this->countTotalPayment($salesInstallment);
    $salesInstallment->save();
  }

  public function update(StoreSalesInstallmentRequest $storeSalesInstallmentRequest, SalesInstallment $salesInstallment) {
    /* update sales pnya data dgn request */
    $salesInstallment->fill($storeSalesInstallmentRequest->validated());

    $salesInstallment->total_payment = $this->countTotalPayment($salesInstallment);
    $salesInstallment->save();
  }
}