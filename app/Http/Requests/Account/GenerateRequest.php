<?php

namespace App\Http\Requests\Account;

use App\Http\Requests\Request;


class GenerateRequest extends Request
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
            'price' => 'numeric|required',
            'phone' => 'min:11|max:15|required',
        ];
    }
}