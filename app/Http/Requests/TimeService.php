<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimeService extends FormRequest
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
            'diaInicio' => 'required',
            'diaFin' => 'required',
            'horaInicio' => 'required',
            'horaFin' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'diaInicio.required' => 'Se debe llenar todos los campos',
            'diaFin.required' => 'Se debe llenar todos los campos',
            'horaInicio.required' => 'Se debe llenar todos los campos',
            'horaFin.required' => 'Se debe llenar todos los campos',
        ];
    }
}
