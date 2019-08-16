<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TimeService extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = Auth::user();
        return $user && $user->rol == 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'diaInicio' => 'required|in:LUNES,MARTES,MIERCOLES,JUEVES,VIERNES,SABADO,DOMINGO',
            'diaFin' => 'required|in:LUNES,MARTES,MIERCOLES,JUEVES,VIERNES,SABADO,DOMINGO',
            'horaInicio' => 'required|date_format:H:i',
            'horaFin' => 'required|date_format:H:i',
        ];
    }

    public function messages()
    {
        return [
            'diaInicio.required' => 'El día de inicio es obligatorio',
            'diaInicio.in' => 'El día de inicio debe ser uno de: LUNES, MARTES, MIERCOLES, JUEVES, VIERNES, SABADO, DOMINGO',
            'diaFin.required' => 'El dia final es obligatorio',
            'diaFin.in' => 'v LUNES, MARTES, MIERCOLES, JUEVES, VIERNES, SABADO, DOMINGO',
            'horaInicio.required' => 'La hora de inicio es obligatorio',
            'horaInicio.date_format' => 'La hora de inicio debe ser del tipo 10:10 AM',
            'horaFin.required' => 'La hora de final es obligatorio',
            'horaFin.date_format' => 'La hora de fin debe ser del tipo 10:10 PM',
        ];
    }
}
