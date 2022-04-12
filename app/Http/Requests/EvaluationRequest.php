<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvaluationRequest extends FormRequest
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
            'user_id' => 'required',
            'shop_id' => 'required',
            'rate' => 'required',
            'comment' => 'required|max:191',
        ];
    }
    public function messages()
    {
        return [
            "required" => "※必須項目です。",
            "comment.max" => "※191文字以内で入力してください。",
        ];
    }
}
