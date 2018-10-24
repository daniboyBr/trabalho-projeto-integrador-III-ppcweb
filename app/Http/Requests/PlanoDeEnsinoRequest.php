<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanoDeEnsinoRequest extends FormRequest
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
            'curso_id'=>'required|integer|min:0',
            'professor_id'=>'required|integer|min:0',
            'disciplina_id'=>'required|integer|min:0',
            'ano' =>'required|numeric|min:0',
            'semestre'=>'required|numeric|min:0',
            'ementa' =>'required',
            'competenciaHabilidades'=>'required',
            'metodologiaDeEnsino'=>'required',
            'avaliacao'=>'required',
            'cargaHorariaSemestral'=>'required|numeric|min:0',
            'periodoDoCurso'=>'required|string|max:50',
        ];
    }
    public function messages()
    {
        return [
            '*.required'=>'Campo acima é obrigatório',
            '*.integer'=>'Campo acima deve ser um inteiro positivo',
            '*.numeric'=>'Campo acima deve conter apenas numeros'
        ];
    }
}
