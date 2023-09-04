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
      'customer_nickname' => ['string', 'max:20', 'required'],
      'customer_age' => ['numeric', 'required'],
      'customer_gender' => ['string', 'required'],
      'customer_phone_no' => ['string', 'required'],
      'customer_full_address' => ['string', 'required'],
      'customer_status' => ['string', 'required'],
      'customer_dependent' => ['string'],
      'customer_workplace_name' => ['string'],
      'customer_workplace_address' => ['string'],
      'customer_workplace_position' => ['string'],
      'customer_fix_income' => ['numeric', 'required'],
      'customer_additional_income' => ['numeric', 'nullable'],
      'customer_fix_expense' => ['numeric', 'required'],
      'customer_additional_expense' => ['numeric', 'nullable'],
      'guarantor_name' => ['string', 'required'],
      'guarantor_relationship' => ['string', 'required'],
      'guarantor_phone_no' => ['string', 'required'],
      'guarantor_full_address' => ['string', 'required'],
      'guarantor_occupation' => ['string', 'required'],
      'guarantor_workplace_address' => ['string', 'required'],
      'motor_right_photo' => ['file', 'mimes:jpeg,png,jpg', 'max:512'],
      'motor_left_photo' => ['file', 'mimes:jpeg,png,jpg', 'max:512'],
      'motor_front_photo' => ['file', 'mimes:jpeg,png,jpg', 'max:512'],
      'motor_back_photo' => ['file', 'mimes:jpeg,png,jpg', 'max:512'],
      'house_photo' => ['file', 'mimes:jpeg,png,jpg', 'max:512'],
      'customer_photo' => ['file', 'mimes:jpeg,png,jpg', 'max:512'],
      'note' => ['string'],
    ];
  }
}
