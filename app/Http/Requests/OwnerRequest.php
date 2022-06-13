<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OwnerRequest extends FormRequest
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
                'owner_user_id' => 'required',
                'owner_user_name' => 'required|max:191',
                // 'owner_user_email' => 'required|max:191|unique:users',
                'owner_user_email' => 'required|max:191',
                'owner_user_password' => 'required|max:191',
                'owner_shop_id' => 'required',
            ];
    }

    public function messages()
    {
        return [
            'owner_user_id.required' => '選択してください。',
            'owner_user_name.required' => '必須項目です。',
            'owner_user_name.max' => '最大191文字です。',
            'owner_user_email.required' => '必須項目です。',
            'owner_user_password.required' => '必須項目です。',
            'owner_shop_id.required' => '選択してください。',
        ];
    }
}
