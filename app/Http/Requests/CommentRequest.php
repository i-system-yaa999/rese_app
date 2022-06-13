<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'comment_user_id' => 'required',
            'comment_shop_id' => 'required',
            'comment_evaluation' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'comment_user_id.required' => '選択してください。',
            'comment_shop_id.required' => '選択してください。',
            'comment_evaluation'=> '評価数を入力してください。'
        ];
    }
}
