<?php

namespace App\Http\Requests\Frontend\User;

use App\Http\Requests\Request;

/**
 * Class UpdateProfileRequest
 * @package App\Http\Requests\Frontend\User
 */
class UpdateProfileRequest extends Request
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
            'name'      => 'required',
            'email'     => 'sometimes|required|email',
            'avatar'    => 'image',
            'tel'       => [
                'string',
                'max:16',
                'regex:#^1[34578]\d{9}$#',
            ],
            'qq'        => [
                'string',
                'max:10',
                'min:5',
                'regex:#^\d+$#',
            ],
            'birthday'  => 'date',
            'id_number' => [
                'nullable',
                'string',
                'size:18',
                'regex:#(^\d{18}$)|(^\d{17}(\d|X|x)$)#',
            ],
        ];
    }
}