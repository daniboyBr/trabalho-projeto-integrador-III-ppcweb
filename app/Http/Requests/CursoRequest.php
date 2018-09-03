<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursoRequest extends FormRequest
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
            '_token' => 'nullable',
            'tipoCurso' => 'required|max:100',
            'modalidade' => 'required|max:100',
            'denominacaoCurso' => 'required|max:150',
            'habilitacao'=> 'required|max:100',
            'localOferta' => 'required|max:150',
            'turnoFuncionamento'=> 'required|max:50',
            'vagaTurno' => 'required|integer',
            'cargaHorariaCurso'=> 'required|integer',
            'regimeLetivo'=> 'required|max:100',
            'periodos'=> 'required|max:100',
            'coordenador_id' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'tipoCurso.required' => 'O campo Tipo do Curso é obrigatório.',
            'modalidade.required' => 'O campo Modalidade é obrigatório.',
            'denominacaoCurso.required' => 'O campo Denominação do Curso é obrigatório',
            'habilitacao.required'=> 'O campo Habilitação é obrigatório.',
            'localOferta.required' => 'O campo Local da Oferta é obrigatório.',
            'turnoFuncionamento.required'=> 'Campo Turno é obrigatório.',
            'vagaTurno.required' => 'Nº Vagas é obrigatório',
            'cargaHorariaCurso.required'=> 'Carga Horária do curso é obrigatório',
            'regimeLetivo.required'=> 'Regime Letivo é obrigatório',
            'periodos.required'=> 'Períodos é obrigatório',
            'coordenador_id.required'=> 'Coordenador é obrigatório.',

            'tipoCurso.max' => 'Permitido até 100 caracteres',
            'modalidade.max' => 'Permitido até 100 caracteres',
            'denominacaoCurso.max' => 'Permitido até 150 caracteres',
            'habilitacao.max'=> 'Permitido até 100 caracteres',
            'localOferta.max' => 'Permitido até 150 caracteres',
            'turnoFuncionamento.max'=> 'Permitido até 50 caracteres',
            'vagaTurno.max' => 'Permitido até 100 caracteres',
            'cargaHorariaCurso.max'=> 'Permitido até 100 caracteres',
            'regimeLetivo.max'=> 'Permitido até 100 caracteres',
            'periodos.max'=> 'Permitido até 100 caracteres',

            'vagaTurno.integer' => 'Apenas números',
            'cargaHorariaCurso.integer'=> 'Permitido apenas números',
            'coordenador_id.integer'=> 'Coordenador Id deve ser um número'
        ];
    }
}