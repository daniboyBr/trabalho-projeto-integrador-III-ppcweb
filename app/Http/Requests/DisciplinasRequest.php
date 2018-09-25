<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DisciplinasRequest extends FormRequest
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
            'id' => 'nullable|integer',
            'nomeDisciplina' => 'required|max:100',
            'descricaoDisciplina' => 'required|max:150',
            'codigoDisciplina' => 'required|max:150',
            'semestreDisciplina'=> 'required|max:50',
            'cargaHorariaDisciplina' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'nomeDisciplina.required' => 'O campo Nome da Disciplina é obrigatório.',
            'descricaoDisciplina.required' => 'O campo Descrição da Disciplina é obrigatório.',
            'codigoDisciplina.required' => 'O campo Codigo da Disciplina do Curso é obrigatório',
            'semestreDisciplina.required'=> 'O campo Semestre é obrigatório.',
            'cargaHorariaDisciplina.required' => 'O campo Carga Horária é obrigatório.',

            'nomeDisciplina.max' => 'Permitido até 100 caracteres',
            'descricaoDisciplina.max' => 'Permitido até 150 caracteres',
            'codigoDisciplina.max' => 'Permitido até 50 caracteres',
            'semestreDisciplina.max'=> 'Permitido até 50 caracteres',


            'cargaHorariaDisciplina.integer'=> 'Permitido apenas números',
        ];
    }
}
