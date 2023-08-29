<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSalesInstallmentRequest extends FormRequest
{
  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
   */
  public function rules(): array
  {
    return [
      'code' => ['string', 'required'],
      'receipt_date' => ['date', 'required'],
      'due_date' => ['date', 'required'],
      'installment_amount' => ['numeric', 'required'],
      'late_payment_days' => ['numeric', 'required'],
      'fine' => ['numeric', 'required'],
      'penalty_debt' => ['numeric', 'required'],
      'period_no' => ['numeric', 'required'],
      'period_left' => ['numeric', 'required'],
      'discount_amount' => ['numeric', 'required'],
      'paid_fine' => ['numeric', 'required'],
      'pay_in' => ['string', 'required'],
      'account' => ['string', 'required'],
      'note' => ['string', 'nullable'],
    ];
  }
}
