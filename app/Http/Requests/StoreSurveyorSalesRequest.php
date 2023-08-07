<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSurveyorSalesRequest extends FormRequest
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
      'customer_surname' => ['string', 'max:20', 'required'],
      'customer_age' => ['numeric', 'required'],
      'customer_gender' => ['string', 'required'],
      'customer_phone_no' => ['string', 'required'],
      'customer_full_address' => ['string', 'required'],
      'customer_status' => ['string', 'required'],
      'customer_dependent' => ['string'],
      'customer_workplace_name' => ['string'],
      'customer_workplace_address' => ['string'],
      'customer_workplace_position' => ['string'],
      'customer_fix_income' => ['decimal:10,2', 'required'],
      'customer_additional_income' => ['decimal:10,2'],
      'customer_fix_expense' => ['decimal:10,2', 'required'],
      'customer_additional_expense' => ['decimal:10,2'],
      'guarantor_name' => ['string'],
      'guarantor_relationship' => ['string'],
      'guarantor_phone_no' => ['string'],
      'guarantor_full_address' => ['string'],
      'guarantor_occupation' => ['string'],
      'guarantor_workplace_address' => ['string'],
      'motor_right_photo' => ['string', 'max:512'],
      'motor_left_photo' => ['string', 'max:512'],
      'motor_front_photo' => ['string', 'max:512'],
      'motor_back_photo' => ['string', 'max:512'],
      'house_photo' => ['string', 'max:512'],
      'customer_photo' => ['string', 'max:512']
    ];
  }
}
