<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'user_name' => 'required|max:191',
            // 'user_email' => 'required|max:191|unique:users',
            'user_email' => 'required|max:191',
            'user_password' => 'required|max:191',
            // 'user_role' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'user_name.required' => '必須項目です。',
            'user_name.max' => '最大191文字です。',
            'user_email.required' => '必須項目です。',
            'user_email.max' => '最大191文字です。',
            'user_email.unique' => 'すでに登録されています。',
            'user_password.required' => '必須項目です。',
            'user_password.max' => '最大191文字です。',
            // 'user_role.required' => '必須項目です。',
        ];
    }
}
