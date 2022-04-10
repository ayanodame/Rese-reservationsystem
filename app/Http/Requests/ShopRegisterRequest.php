<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRegisterRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'area_id' => 'required',
            'genre_id' => 'required',
            'owner_id' => 'required',
            'summary' => 'required|string|max:191',
            'open_time' => 'required|date_format:H:i',
            'close_time ' => 'required|date_format:H:i',
            'image_url' => 'required|max:255',
        ];
    }
    public function messages()
    {
        return [
            "required" => "※必須項目です。",
            "name.max" => "※50文字以内で入力してください。",
            "summary.max" => "※191文字以内で入力してください。",
            "image_url.max" => "※255文字以内で入力してください。",
            "date_format:H:i" => "※「H:i」形式で入力してください。"
        ];
    }
}
