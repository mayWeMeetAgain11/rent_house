<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'region' => 'required|regex:/^[a-zA-Z]+$/',
            'address' => 'required|regex:/^[a-zA-Z]+$/',
            'city' => 'required|regex:/^[a-zA-Z]+$/',
            'type' => 'required|string',
            'ikar_type' => 'required|string',
            'price' => 'required|numeric|min:50000|max:500000000|regex:/^([1-9])[0-9]+$/',
            'space' => 'required|numeric|max:500|min:20|regex:/^([1-9])[0-9]+$/',
            'room_number' => 'required|numeric|max:20|regex:/^([1-9])[0-9]*$/',
            'floors_number' => 'required|numeric|max:10|regex:/^([1-9])[0-9]*$/',
            'img' => 'required|image',
        ];
    }
}
