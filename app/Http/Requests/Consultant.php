<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Consultant extends FormRequest
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
            'identification' => 'required|integer|min:5|unique:Consultants',
            'name' => 'required',
            'email' => 'required|email|unique:Consultants',
            'password' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'identification.min' => '',
            'identification.unique' => '',
            'name.required' => 'Se debe llenar todos los campos',
            'email.required' => 'Se debe llenar todos los campos',
            'email.email' => '',
            'email.unique' => '',
            'password.required' => 'Se debe llenar todos los campos',
            'password.min' => 'Se debe llenar todos los campos',
        ];
    }
}
