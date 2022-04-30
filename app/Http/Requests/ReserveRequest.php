<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReserveRequest extends FormRequest
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
            'reserve_date' => 'required|date|after:yesterday',
            'reserve_time' => 'required|date_format:H:i',
            'reserve_number' => 'required|min:1|max:65535',
            'date_time' => 'after:now'
        ];
    }

    public function messages()
    {
        return [
            'reserve_date.required' => '日付を入力してください。',
            'reserve_date.date' => '日付の形式が違います。',
            'reserve_date.after' => '今日以降の日付を指定してください。',
            'reserve_time.required' => '時間を入力してください。',
            'reserve_time.date_format' => '時間の形式が違います。',
            'reserve_time.after' => '現在の時刻以降を指定してください。',
            'reserve_number.required' => '人数を入力してください。',
            'reserve_number.min' => '人数を入力してください。',
            'reserve_number.max' => '予約できる最大人数は65535人です。',
            'date_time.after' => '現在の日付け、時間よりも先の日付けと時間を指定してください。',
        ];
    }
    protected function prepareForValidation()
    {
        $date_time = ($this->filled(['reserve_date', 'reserve_time'])) ? $this->reserve_date . ' ' . $this->reserve_time : '';
        $this->merge([
            'date_time' => $date_time
        ]);
    }
}
