<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCreditSalesRequest extends FormRequest
{
  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
   */
  public function rules(): array
  {
    return [
      'sales_date' => ['date'],
      'motor_plate_number' => ['string', 'max:50', 'required'],
      'motor_type' => ['string', 'max:50'],
      'motor_frame_number' => ['string', 'max:50', 'required'],
      'motor_engine_number' => ['string', 'max:50', 'required'],
      'motor_assemble_year' => ['string', 'max:50', 'required'],
      'motor_color' => ['string', 'max:50'],
      'sales_collector' => ['string', 'max:50', 'required'],
      'sales_person' => ['string', 'max:50', 'required'],
      'motor_price' => ['numeric', 'required'],
      'motor_dp' => ['numeric', 'required'],
      'motor_installment_amount' => ['numeric', 'required'],
      'motor_installment_period' => ['numeric', 'required'],
      'dealer_id' => ['exists:dealers,id'],
    ];
  }
}
