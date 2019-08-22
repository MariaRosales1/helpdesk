<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'nit' => 'required|string|regex:/^\d{5,30}$/',
            'name' => 'required|string|min:2|max:20',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio',
            'name.min' => 'El nombre debe tener entre 2 y 20 caracteres',
            'name.max' => 'El nombre debe tener entre 2 y 20 caracteres',
            'nit.required' => 'El NIT es obligatorio',
            'nit.regex' => 'El NIT debe tener entre 5 y 30 caracteres y ser digitos solo digitos',
            'nit.min' => 'El NIT no pude ser negativo',
        ];
    }
}
