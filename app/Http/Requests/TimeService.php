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
            'start_day' => 'required|in:LUNES,MARTES,MIERCOLES,JUEVES,VIERNES,SABADO,DOMINGO',
            'final_day' => 'required|in:LUNES,MARTES,MIERCOLES,JUEVES,VIERNES,SABADO,DOMINGO',
            'start_time' => 'required|date_format:H:i',
            'final_time' => 'required|date_format:H:i',
        ];
    }

    public function messages()
    {
        return [
            'start_day.required' => 'El campo día de inicio es requerido',
            'start_day.in' => 'El día de inicio debe ser uno de: LUNES, MARTES, MIERCOLES, JUEVES, VIERNES, SABADO, DOMINGO',
            'final_day.required' => 'El campo día de fin es requerido',
            'final_day.in' => 'El día de fin debe ser uno de: LUNES, MARTES, MIERCOLES, JUEVES, VIERNES, SABADO, DOMINGO',
            'start_time.required' => 'La hora de inicio es requerida',
            'start_time.date_format' => 'La hora de inicio debe ser del tip 10:10 AM',
            'final_time.required' => 'La hora de fin es requerida',
            'final_time.date_format' => 'La hora de fin debe ser del tip 10:10 PM',
        ];
    }
}
