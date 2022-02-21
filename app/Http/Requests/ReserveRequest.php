<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReserveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'use_date' => 'required|date',
            'use_time' => 'required|date_format:H:i',
            'people' => 'required',
        ];
    }
    public function messages()
    {
        return [
            "required" => "必須項目です。",
        ];
    }
}
