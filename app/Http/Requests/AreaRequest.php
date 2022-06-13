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
            // 'area_name' => 'required|max:10|unique:areas',
            'area_name' => 'required|max:10',
        ];
    }

    public function messages()
    {
        return [
            'area_name.required' => '必須項目です。',
            'area_name.max' => '最大10文字まで',
            'area_name.unique' => 'すでに登録されています。',
        ];
    }
}
