<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdatePlaceRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function rules()
  {
    return [
      'place_name' => [
        'required', 'string'
      ],
      'place_desc' => [
        'required', 'string',
      ]
    ];
  }

  public function authorize()
  {
    return Gate::allows('place_access');
  }
}
