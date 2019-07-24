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
                    'identification' => 'required|min:0|integer|digits_between:5,15|unique:Consultants,id,:id',
                    'name' => 'required',
                    'email' => 'required|email|unique:Consultants,id,:id',
                    'password' => 'required|min:6',
                ];
                break;
            case 'POST':
                $rules = [
                    'identification' => 'required|min:0|integer|digits_between:5,15|unique:Consultants',
                    'name' => 'required',
                    'email' => 'required|email|unique:Consultants',
                    'password' => 'required|min:6'
                ];
                break;
ss
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'identification.required' => 'La identificación es obligatoria',
            'identification.integer' => 'La identificación debe ser numérica',
            'digits_between'=> 'La identificación debe contener entre 5 y 15 digítos',
            'identification.min' => 'La identificación no puede ser negativas',
            'identification.unique' => 'La identificación ya esta en uso',
            'name.required' => 'El nombre es obligatorio',
            'email.required' => 'El correo electronico es obligatorio',
            'email.email' => 'El correo electrónico es incorrecto',
            'email.unique' => 'El correo electrónico ya está en uso',
            'password.required' => 'La contraseña es obligatoria',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres',
        ];
    }
}
