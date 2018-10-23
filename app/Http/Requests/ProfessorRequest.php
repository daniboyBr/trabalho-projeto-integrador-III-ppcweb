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
            'cpfProfessor'=> 'required|regex:/^[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}$/',
            'maiorTitulacao'=> 'required|string|max:100',
            'areaFormacao'=> 'required|string|max:100',
            'curriculoLates'=> 'required|string|max:100',
            'dataAtualizacaoCurriculo'=> 'required|date_format:"d/m/Y"',
            'matriculaProfessor'=> 'required|numeric',
            'dataAdmissao'=> 'required|date_format:"d/m/Y"',
            'horasNDE'=> 'required_with:membroNDE|integer|min:0|nullable',
            'horasOrientacaoTCC'=> 'required|integer|min:0',
            'horasCoordenacaoCurso'=> 'nullable|integer|min:0',
            'horasCoordenacaoOutrosCursos'=> 'nullable|integer|min:0',
            'horasPesquisaSmAtual'=> 'required|integer|min:0',
            'horasAtividadeExtraClasse'=> 'required|integer|min:0',
            'horasAtividadeExtClasseOutrosCursos'=> 'required|integer|min:0',
            'qtdHorasCurso'=> 'required|integer|min:0',
            'qtdHorasOutrosCurso'=> 'required|integer|min:0',
            'membroNDE'=> 'nullable|boolean',
            'membroColegiado'=> 'nullable|boolean',
            'docenteFCEP'=> 'nullable|boolean',
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
            'comprovantePublicacao'=>'required|array|min:1',
            'comprovantePublicacao.*.comprovante'=>'required|string|max:50',
            'comprovantePublicacao.*.data'=>'required|date_format:"d/m/Y"',
            'comprovantePublicacao.*.local'=>'required|string|max:50',
            'comprovantePublicacao.*.anexo'=>'nullable|file|mimes:pdf|max:10000',
            'DisciplinasMinistradas'=>'required|array|min:1',
            'DisciplinasMinistradas.*.disciplina'=>'required|string|max:50',
            'DisciplinasMinistradas.*.cargaHoraria'=>'required|integer|min:0',
            'DisciplinasMinistradasOutrosCursos'=>'required|array|min:1',
            'DisciplinasMinistradasOutrosCursos.*.curso'=>'required|string|max:50',
            'DisciplinasMinistradasOutrosCursos.*.disciplina'=>'required|string|max:50',
            'DisciplinasMinistradasOutrosCursos.*.cargaHoraria'=>'required|integer|min:0',
            'comprovanteEventos'=>'required_if:qtdParicipacaoEventos,>=,1|array|min:1',
            'comprovanteEventos.*.comprovante'=>'required|string|max:50',
            'comprovanteEventos.*.data'=>'required|date_format:"d/m/Y"',
            'comprovanteEventos.*.local'=>'required|string|max:50',
            'comprovanteEventos.*.anexo'=>'nullable|file|mimes:pdf|max:10000',
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
            'comprovantePublicacao.required'=>'Comprovante é obrigatório',
            'comprovantePublicacao.*.comprovante.required'=>'Comprovante é obrigatório',
            'comprovantePublicacao.*.data.required'=>'Data da Publicação é obrigatório',
            'comprovantePublicacao.*.local.required'=>'Local da Publicação é obrigatório',
            'comprovantePublicacao.*.anexo.required'=>'Gentileza anexar comprovante',
            'DisciplinasMinistradas.*.disciplina.required'=>'Disciplinas Ministradas é obrigatório',
            'DisciplinasMinistradas.*.cargaHoraria.required'=>'Carga horária das Disciolinas ministrada é obrigatório',
            'DisciplinasMinistradasOutrosCursos.*.curso.required'=>'Curos é obrigatório',
            'DisciplinasMinistradasOutrosCursos.*.disciplina.required'=>'Disciplina é obrigatório',
            'DisciplinasMinistradasOutrosCursos.*.cargaHoraria.required'=>'Carga horária é Obrigatória',
            'comprovantePublicacao.*.anexo.mimes'=>'Tipo de Arquivo aceito pdf',
            'comprovantePublicacao.*.anexo.max'=>'Tamanho máximo de arquivo 10MB',
            'comprovantePublicacao.*.comprovante.max'=>'Comprovante deve ter no máximo 50 caracteres',
            'comprovantePublicacao.*.data.date'=>'Data deve estar no formato DD/MM/YYYY',
            'comprovantePublicacao.*.local.max'=>'Local aceita apenas 50 caracteres',
            'comprovanteEventos.*.anexo.mimes'=>'Tipo de Arquivo aceito pdf',
            'comprovanteEventos.*.anexo.max'=>'Tamanho máximo de arquivo 10MB',
            'comprovanteEventos.*.comprovante.max'=>'Comprovante deve ter no máximo 50 caracteres',
            'comprovanteEventos.*.data.date'=>'Data deve estar no formato DD/MM/YYYY',
            'comprovanteEventos.*.local.max'=>'Local aceita apenas 50 caracteres',
            'DisciplinasMinistradas.*.disciplina.max'=>'Disciplinas deve ter no máximo 50 caracteres',
            'DisciplinasMinistradas.*.cargaHoraria.integer'=>'Carga horária deve ser um numero inteiro positivo',
            'DisciplinasMinistradasOutrosCursos.*.curso.max'=>'Curso deve ter no máximo 50 caracteres',
            'DisciplinasMinistradasOutrosCursos.*.disciplina.max'=>'Disciplina deve ter no máximo 50 caracteres',
            'DisciplinasMinistradasOutrosCursos.*.cargaHoraria.integer'=>'Carga horária deve ser um numero positivo',
            '*.required' => 'Campo acima é obrigatório',
            '*.integer' => 'Campo acima deve ser um número inteiro positivo',
            '*.date_format'=>'Data deve estar no formato DD/MM/YYYY',
            '*.min'=>'Campo acima deve ser um numero positivo',
            'horasNDE.required_with'=>'O preenchimentro é obrigatório se membro NDE',
            'DisciplinasMinistradas.required' => 'Nescessário informar as disciplinas ministradas',
            'DisciplinasMinistradasOutrosCursos.required' => 'Nescessário informar as disciplinas ministradas em outros cursos'
        ];
    }

}
