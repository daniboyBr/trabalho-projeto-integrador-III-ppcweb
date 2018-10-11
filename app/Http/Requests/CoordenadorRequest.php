<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoordenadorRequest extends FormRequest
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
            'nomeCoordenador' => 'required|max:100',
            'cpfCoordenador' => 'required|regex:/^[0-9]{11}$/',
            'titulacaoCoordenador' => 'required|max:50',
            'tempoDedicacaoCoordenador'=> 'required|max:50',
        ];
    }

    public function messages()
    {
        return [
            'nomeCoordenador.required' => 'Campo Nome é obrigatório',
            'titulacaoCoordenador.required' => 'Campo Titulação é obrigatório',
            'tempoDedicacaoCoordenador.required'=> 'Campo Tempo de Dedicação é obrigatório',
            'cpfCoordenador.required' => 'CPF é obrigatório',

            'nomeCoordenador.max' => 'Permitido até 100 caracteres',
            'titulacaoCoordenador.max' => 'Permitido até 50 caracteres',
            'tempoDedicacaoCoordenador.max'=> 'Permitido até 50 caracteres',

            'cpfCoordenador.regex' => 'Coordenador aceita apenas 11 números',
        ];
    }
}
