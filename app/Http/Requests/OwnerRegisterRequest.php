<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OwnerRegisterRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:App\Models\Owner,email|max:50',
            'password' => 'required|min:8|max:50',
        ];
    }
    public function messages()
    {
        return [
            "required" => "必須項目です。",
            "email" => "メールアドレスの形式で入力してください。",
            "email.unique" => "登録済みのメールアドレスです。",
            "email.max" => "50文字以内で入力してください。",
            "name.max" => "100文字以内で入力してください。",
            "password.max" => "50文字以内で入力してください。",
            "password.min" => "8文字以上で入力してください。",
        ];
    }
}
