<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreLabRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function rules()
  {
    return [
      'item_name' => [
        'required', 'string'
      ],
      'item_desc' => [
        'required', 'string',
      ],
    ];
  }

  public function authorize()
  {
    return Gate::allows('lab_access');
  }
}
