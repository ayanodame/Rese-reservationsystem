<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AreaRequest extends FormRequest
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
            'name' => 'required|max:50|unique:App\Models\Area,name'
        ];
    }
    public function messages()
    {
        return [
            "required" => "必須項目です。",
            "name.max" => "50文字以内で入力してください。",
            "name.unique" => "登録済みのエリア名です。",
        ];
    }
}
