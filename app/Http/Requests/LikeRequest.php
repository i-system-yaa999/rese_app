<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LikeRequest extends FormRequest
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
            'like_user_id' => 'required',
            'like_shop_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'like_user_id.required' => '選択してください。',
            'like_shop_id.required' => '選択してください。',
        ];
    }
}
