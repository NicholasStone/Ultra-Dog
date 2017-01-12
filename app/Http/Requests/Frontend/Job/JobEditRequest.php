<?php

namespace App\Http\Requests\Frontend\Job;

use Illuminate\Foundation\Http\FormRequest;

class JobEditRequest extends FormRequest
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
            'title'              => 'required|max:50',
            'reward'             => [
                'required',
//                'regex:^\d{1,8}\.\d{0,2}$',
            ],
            'describe'           => 'required|min:50|max:500',
            'start_at'           => 'required|date',
            'maintain'           => 'required|integer',
            'work_hours_pre_day' => 'required|integer|max:8',
            'cover'              => 'image',
        ];
    }

    public function messages()
    {
        return [
            'reward.regex' => '酬金输入错误，请输入大于等于 0 小于等于9999999.99 的数字'
        ];
    }
}
