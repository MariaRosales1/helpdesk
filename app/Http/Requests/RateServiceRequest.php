<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RateServiceRequest extends FormRequest
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
            'comment' => 'nullable|max:200',
            'score' => 'required|integer|min:1|max:10',
        ];
    }

    public function messages()
    {
        return [
            'comment.max' => 'El comentario debe tener menos de 200 caracteres',
            'score.required' => 'Por favor seleccione la calificación',
            'score.integer' => 'Por favor seleccione la calificación',
            'score.min' => 'El puntaje debe estar entre 1 y 10',
            'score.max' => 'El puntaje debe estar entre 1 y 10',
        ];
    }
}
