<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
{
  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
   */
  public function rules(): array
  {
    return [
      'username' => ['string', 'max:255', 'required'],
      'email' => ['email', 'max:255', 'required', Rule::unique(User::class)->ignore($this->route('user')->id)],
      'role' => ['int', 'required']
    ];
  }
}
