<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
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
                'shop_name' => 'required|max:191',
                'shop_area_id' => 'required',
                'shop_genre_id' => 'required',
                'shop_summary' => 'required',
                'shop_image_url' => 'required|max:191',
            ];
    }

    public function messages()
    {
        return [
            'shop_name.required' => '必須項目です。',
            'shop_name.max' => '最大191文字です。',
            'shop_area_id.required' => '選択してください。',
            'shop_genre_id.required' => '選択してください。',
            'shop_summary.required' => '必須項目です。',
            'shop_image_url.required' => '必須項目です。',
            'shop_image_url.max' => '最大191文字です。',
            // 'shop_likes_count.required' => '',
        ];
    }
}
