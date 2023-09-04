<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCashSalesRequest extends FormRequest
{
  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
   */
  public function rules(): array
  {
    return [
      'customer_name' => ['string', 'max:50', 'required'],
      'customer_family_card_no' => ['numeric', 'required'],
      'customer_phone_no' => ['string', 'required'],
      'customer_full_address' => ['string', 'required'],
      'sales_date' => ['date', 'required'],
      'sales_code' => ['string', 'required'],
      'motor_plate_number' => ['string', 'required'],
      'motor_type' => ['string', 'required'],
      'motor_engine_number' => ['string', 'required'],
      'motor_frame_number' => ['string', 'required'],
      'motor_assemble_year' => ['date_format:Y', 'required'],
      'motor_color' => ['string', 'required', 'max:15'],
      'motor_price' => ['numeric', 'required'],
    ];
  }
}
