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
        switch ($this->method()) {
            case 'PUT':
                $rules = [
                    'identification' => 'required|integer|min:5|unique:Consultants,id,:id',
                    'name' => 'required',
                    'email' => 'required|email|unique:Consultants,id,:id',
                    'password' => 'required|min:6',
                ];
                break;
            case 'POST':
                $rules = [
                    'identification' => 'required|integer|min:5|unique:Consultants',
                    'name' => 'required',
                    'email' => 'required|email|unique:Consultants',
                    'password' => 'required|min:6',
                ];
                break;

        }
        return $rules;
    }

    public function messages()
    {
        return [
            'identification.required' => '',
            'identification.integer' => 'La identificación debe ser numérica',
            'identification.min' => 'La identificación debe tener por lo menos 5 caracteres',
            'identification.unique' => 'La identificación ya esta en uso',
            'name.required' => '',
            'email.required' => '',
            'email.email' => 'El correo electrónico es incorrecto',
            'email.unique' => 'El correo electrónico ya está en uso',
            'password.required' => '',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres',
        ];
    }
}
