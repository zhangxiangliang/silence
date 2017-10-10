<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateWorkRequest extends Request
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
            'title' => 'required|min:2',
            'price' => 'required|digits_between:0,10000',
            'place' => 'required',
            'time'  => 'required|date',
            'published_at' => 'required|date',
            'description' => 'required|min:5',
            'company' => 'required|min:2',
            'status' =>'required',
        ];
    }
}
