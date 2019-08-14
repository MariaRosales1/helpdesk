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
            'diaInicio.required' => 'El campo día de inicio es requerido',
            'diaInicio.in' => 'El día de inicio debe ser uno de: LUNES, MARTES, MIERCOLES, JUEVES, VIERNES, SABADO, DOMINGO',
            'diaFin.required' => 'El campo día de fin es requerido',
            'diaFin.in' => 'El día de fin debe ser uno de: LUNES, MARTES, MIERCOLES, JUEVES, VIERNES, SABADO, DOMINGO',
            'horaInicio.required' => 'La hora de inicio es requerida',
            'horaInicio.date_format' => 'La hora de inicio debe ser del tip 10:10 AM',
            'horaFin.required' => 'La hora de fin es requerida',
            'horaFin.date_format' => 'La hora de fin debe ser del tip 10:10 PM',
        ];
    }
}
