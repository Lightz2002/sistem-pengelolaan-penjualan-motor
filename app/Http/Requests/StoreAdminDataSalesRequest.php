<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAdminDataSalesRequest extends FormRequest
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
      'customer_family_card_no' => ['string', 'max:50', 'required'],
      'customer_identity_card_no' => ['string', 'max:50', 'required'],
      'customer_full_address' => ['string', 'required'],
      'motor_type' => ['string'],
      'motor_plate_number' => ['string'],
      'motor_price' => ['numeric'],
      'dealer_id' => ['exists:dealers,id'],
    ];
  }
}
