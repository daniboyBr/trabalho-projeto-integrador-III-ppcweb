<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfessorRequest extends FormRequest
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
            'nomeProfessor'=> 'required|string|max:100',
            'cpfProfessor'=> [
                'required',
                'regex:/^[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}$/',
                'unique:professors,cpfProfessor,' . str_replace(['.','-'],['',''],$this->cpfProfessor)
            ],
            'maiorTitulacao'=> 'required|string|max:100',
            'areaFormacao'=> 'required|string|max:100',
            'curriculoLates'=> 'required|string|max:100',
            'dataAtualizacaoCurriculo'=> 'required|date_format:"d/m/Y"',
            'matriculaProfessor'=> 'required|numeric',
            'dataAdmissao'=> 'required|date_format:"d/m/Y"',
            'horasNDE'=> 'required|integer|min:0|min:0',
            'horasOrientacaoTCC'=> 'required|integer|min:0',
            'horasCoordenacaoCurso'=> 'required|integer|min:0',
            'horasCoordenacaoOutrosCursos'=> 'required|integer|min:0',
            'horasPesquisaSmAtual'=> 'required|integer|min:0',
            'horasAtividadeExtraClasse'=> 'required|integer|min:0',
            'horasAtividadeExtClasseOutrosCursos'=> 'required|integer|min:0',
            'qtdHorasCurso'=> 'required|integer|min:0',
            'qtdHorasOutrosCurso'=> 'required|integer|min:0',
            'membroNDE'=> 'required|integer|min:0',
            'membroColegiado'=> 'required|integer|min:0',
            'docenteFCEP'=> 'required|integer|min:0',
            'tempoVinculo'=> 'required|date_format:"d/m/Y"',
            'tempoCursosEAD'=> 'required|date_format:"d/m/Y"',
            'tempoExpMagisterioSuperior'=> 'required|date_format:"d/m/Y"',
            'tempoExpProfissional'=> 'required|date_format:"d/m/Y"',
            'qtdParicipacaoEventos'=> 'required|integer|min:0',
            'qtdArtigosNaArea'=> 'required|integer|min:0',
            'qtdArtigosOutrasAreas'=> 'required|integer|min:0',
            'qtdLivrosNaArea'=> 'required|integer|min:0',
            'qtdLivrosOutrasAreas'=> 'required|integer|min:0',
            'qtdTrabalhosEmAnaisCompletos'=> 'required|integer|min:0',
            'qtdTrabalhosEmAnaisResumo'=> 'required|integer|min:0',
            'qtdPropriedadeIntelectualDepositada'=> 'required|integer|min:0',
            'qtdPropriedadeIntelectualRegistrada'=> 'required|integer|min:0',
            'qtdTraducoes'=>'required|integer|min:0',
            'qtdProjetosArtiticosCulturais'=> 'required|integer|min:0',
            'qtdProducaoDidaticoPedagogica'=> 'required|integer|min:0',
            'comprovatePublicacao'=>'required|array|min:1',
            'comprovatePublicacao.*.comprovante'=>'required|string|max:50',
            'comprovatePublicacao.*.data'=>'required|date_format:"d/m/Y"',
            'comprovatePublicacao.*.local'=>'required|string|max:50',
            'comprovatePublicacao.*.anexo'=>'nullable|file|mimes:pdf|max:10000',
            'DisciplinasMinistradas'=>'required|array|min:1',
            'DisciplinasMinistradas.*.disciplina'=>'required|string|max:50',
            'DisciplinasMinistradas.*.cargaHoraria'=>'required|integer|min:0',
            'DisciplinasMinistradasOutrosCursos'=>'required|array|min:1',
            'DisciplinasMinistradasOutrosCursos.*.curso'=>'required|string|max:50',
            'DisciplinasMinistradasOutrosCursos.*.disciplina'=>'required|string|max:50',
            'DisciplinasMinistradasOutrosCursos.*.cargaHoraria'=>'required|integer|min:0',
            'comprovateEventos'=>'required|array|min:1',
            'comprovateEventos.*.comprovante'=>'required|string|max:50',
            'comprovateEventos.*.data'=>'required|date_format:"d/m/Y"',
            'comprovateEventos.*.local'=>'required|string|max:50',
            'comprovateEventos.*.anexo'=>'nullable|file|mimes:pdf|max:10000',
        ];
    }

    public function messages()
    {
        return [
            'nomeProfessor.max'=> 'Nome deve ter no maximo 100 caracteres',
            'cpfProfessor.regex'=> 'CPF deve estar no formato 000.000.000-00',
            'cpfProfessor.unique'=> 'CPF já existe na base de dados',
            'maiorTitulacao.max'=> 'Maior Titulação deve ter no maximo 100 caracteres',
            'areaFormacao.max'=> 'Área de formaççao deve ter no maximo 100 caracteres',
            'curriculoLates.max'=> 'Curriculo Lattes ter no maximo 100 caracteres',
            'comprovatePublicacao.required'=>'Comprovante é obrigatório',
            'comprovatePublicacao.*.comprovante.required'=>'Comprovante é obrigatório',
            'comprovatePublicacao.*.data.required'=>'Data da Publicação é obrigatório',
            'comprovatePublicacao.*.local.required'=>'Local da Publicação é obrigatório',
            'comprovatePublicacao.*.anexo.required'=>'Gentileza anexar comprovante',
            'DisciplinasMinistradas.*.disciplina.required'=>'Disciplinas Ministradas é obrigatório',
            'DisciplinasMinistradas.*.cargaHoraria.required'=>'Carga horária das Disciolinas ministrada é obrigatório',
            'DisciplinasMinistradasOutrosCursos.*.curso.required'=>'Curos é obrigatório',
            'DisciplinasMinistradasOutrosCursos.*.disciplina.required'=>'Disciplina é obrigatório',
            'DisciplinasMinistradasOutrosCursos.*.cargaHoraria.required'=>'Carga horária é Obrigatória',
            'comprovatePublicacao.*.anexo.mimes'=>'Tipo de Arquivo aceito pdf',
            'comprovatePublicacao.*.anexo.max'=>'Tamanho máximo de arquivo 10MB',
            'comprovatePublicacao.*.comprovante.max'=>'Comprovante deve ter no máximo 50 caracteres',
            'comprovatePublicacao.*.data.date'=>'Data deve estar no formato DD/MM/YYYY',
            'comprovatePublicacao.*.local.max'=>'Local aceita apenas 50 caracteres',
            'comprovateEventos.*.anexo.mimes'=>'Tipo de Arquivo aceito pdf',
            'comprovateEventos.*.anexo.max'=>'Tamanho máximo de arquivo 10MB',
            'comprovateEventos.*.comprovante.max'=>'Comprovante deve ter no máximo 50 caracteres',
            'comprovateEventos.*.data.date'=>'Data deve estar no formato DD/MM/YYYY',
            'comprovateEventos.*.local.max'=>'Local aceita apenas 50 caracteres',
            'DisciplinasMinistradas.*.disciplina.max'=>'Disciplinas deve ter no máximo 50 caracteres',
            'DisciplinasMinistradas.*.cargaHoraria.integer'=>'Carga horária deve ser um numero inteiro positivo',
            'DisciplinasMinistradasOutrosCursos.*.curso.max'=>'Curso deve ter no máximo 50 caracteres',
            'DisciplinasMinistradasOutrosCursos.*.disciplina.max'=>'Disciplina deve ter no máximo 50 caracteres',
            'DisciplinasMinistradasOutrosCursos.*.cargaHoraria.integer'=>'Carga horária deve ser um numero positivo',
            '*.required' => 'Campo acima é obrigatório',
            '*.integer' => 'Campo acima deve ser um número inteiro positivo',
            '*.date_format'=>'Data deve estar no formato DD/MM/YYYY',
            '*.min'=>'Campo acima deve ser um numero positivo'
        ];
    }

}
