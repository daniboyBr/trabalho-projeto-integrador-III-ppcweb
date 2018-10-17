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
            'cpfProfessor'=> 'required|regex:/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}$/g',
            'maiorTitulacao'=> 'required|tring|max:100',
            'areaFormacao'=> 'required|tring|max:100',
            'curriculoLates'=> 'required|tring|max:100',
            'dataAtualizacaoCurriculo'=> 'required|date_format:"d/m/Y"',
            'matriculaProfessor'=> 'required|number',
            'dataAdmissao'=> 'required|date_format:"d/m/Y"',
            'horasNDE'=> 'required|integer',
            'horasOrientacaoTCC'=> 'required|integer',
            'horasCoordenacaoCurso'=> 'required|integer',
            'horasCoordenacaoOutrosCursos'=> 'required|integer',
            'horasPesquisaSmAtual'=> 'required|integer',
            'horasAtividadeExtraClasse'=> 'required|integer',
            'horasAtividadeExtClasseOutrosCursos'=> 'required|integer',
            'qtdHorasCurso'=> 'required|integer',
            'qtdHorasOutrosCurso'=> 'required|integer',
            'membroNDE'=> 'required|integer',
            'membroColegiado'=> 'required|integer',
            'docenteFCEP'=> 'required|integer',
            'tempoVinculo'=> 'required|date_format:"d/m/Y"',
            'tempoCursosEAD'=> 'required|date_format:"d/m/Y"',
            'tempoExpMagisterioSuperior'=> 'required|date_format:"d/m/Y"',
            'tempoExpProfissional'=> 'required|date_format:"d/m/Y"',
            'qtdParicipacaoEventos'=> 'required|integer',
            'qtdArtigosNaArea'=> 'required|integer',
            'qtdArtigosOutrasAreas'=> 'required|integer',
            'qtdLivrosNaArea'=> 'required|integer',
            'qtdLivrosOutrasAreas'=> 'required|integer',
            'qtdTrabalhosEmAnaisCompletos'=> 'required|integer',
            'qtdTrabalhosEmAnaisResumo'=> 'required|integer',
            'qtdPropriedadeIntelectualDepositada'=> 'required|integer',
            'qtdPropriedadeIntelectualRegistrada'=> 'required|integer',
            'qtdProjetosArtiticosCulturais'=> 'required|integer',
            'qtdProducaoDidaticoPedagogica'=> 'required|integer',
            'comprovatePublicacao.*.comprovante'=>'required|string|max:50',
            'comprovatePublicacao.*.data'=>'required|date_format:"d/m/Y"',
            'comprovatePublicacao.*.local'=>'required|string|max:50',
            'comprovatePublicacao.*.anexo'=>'required|file|mimes:pdf|size:10000',
            'DisciplinasMinistradas.*.disciplina'=>'required|string|max:50',
            'DisciplinasMinistradas.*.cargaHoraria'=>'required|integer',
            'DisciplinasMinistradasOutrosCursos.*.curso'=>'required|string|max:50',
            'DisciplinasMinistradasOutrosCursos.*.disciplina'=>'required|string|max:50',
            'DisciplinasMinistradasOutrosCursos.*.cargaHoraria'=>'required|integer',

        ];
    }

    public function messages()
    {
        return [
            'nomeProfessor.required'=> 'Nome é obrigatório',
            'cpfProfessor.required'=> 'CPF é obrigatório',
            'maiorTitulacao.required'=> 'Maior Titulação é obrigatório',
            'areaFormacao.required'=> 'Área de formaççao é obrigatório',
            'curriculoLates.required'=> 'Curriculo Lates é obrigatório',
            'dataAtualizacaoCurriculo.required'=> 'Data de Atualização é obrigatório',
            'matriculaProfessor.required'=> 'Matricula é obrigatório',
            'dataAdmissao.required'=> 'Data de Admissão é obrigatório',
            'horasNDE.required'=> 'required|integer',
            'horasOrientacaoTCC.required'=> 'Qtd Horas Oritentação TCC é obrigatório',
            'horasCoordenacaoCurso.required'=> 'Horas Coordenação Curso é obrigatório',
            'horasCoordenacaoOutrosCursos.required'=> 'Horas Coordenação Outros Cursos é obrigatório',
            'horasPesquisaSmAtual.required'=> 'Horas pesquisas Semestre Atual é obrigatório',
            'horasAtividadeExtraClasse.required'=> 'Horas pesquisas Semestre Atual é obrigatório',
            'horasAtividadeExtClasseOutrosCursos.required'=> 'Horas de Atividade Extra Classe é obrigatório',
            'qtdHorasCurso.required'=> 'Qtd de Horas Curso é obrigatório',
            'qtdHorasOutrosCurso.required'=> 'Qtd de Horas Outros Cursos é obrigatório',
            'membroNDE.required'=> 'Membro do NDE é Obrigatório',
            'membroColegiado.required'=> 'Membro do Colegiado é Obrigatório',
            'docenteFCEP.required'=> 'Docente em Formação/Capacitação/Experiência é obrigatório',
            'tempoVinculo.required'=> 'Tempo de Vinculo é obrigatório',
            'tempoCursosEAD.required'=> 'Tempo Curso EAD é obrigatório',
            'tempoExpMagisterioSuperior.required'=> 'Tempo de Experiência Magistŕio Superior é obrigatório',
            'tempoExpProfissional.required'=> 'Tempo de Experiência Proficional é obrigatório',
            'qtdParicipacaoEventos.required'=> 'Quantidade de Participação em Eventos é obrigatório',
            'qtdArtigosNaArea.required'=> 'Quantidade de Artigos na área é obrigatório',
            'qtdArtigosOutrasAreas.required'=> 'Quantidade de Artigos outras areas é obrigatório',
            'qtdLivrosNaArea.required' => 'Quantidade de livros na Área é obrigatório',
            'qtdLivrosOutrasAreas.required'=> 'Quantidade de livros em Outras Áreas é obrigatório',
            'qtdTrabalhosEmAnaisCompletos.required'=> 'Quantidadde de Trabalhos em Anais Completos é Obrigatório',
            'qtdTrabalhosEmAnaisResumo.required'=> 'Quantidadde de Trabalhos em Anais Resumidos é Obrigatório',
            'qtdPropriedadeIntelectualDepositada.required'=> 'Quantidadde de Propriedade Intelectual Depositada é Obrigatório',
            'qtdPropriedadeIntelectualRegistrada.required'=> 'Quantidadde de Propriedade Intelectual Registrada é Obrigatório',
            'qtdProjetosArtiticosCulturais.required'=> 'Quantidadde de Projetos Atisticos ou/e Cutulturais é obrigaorio',
            'qtdProducaoDidaticoPedagogica.required'=> 'Quantidadde de Produção Didatíco pedadógico é obrigaorio',
            'comprovatePublicacao.*.comprovante.required'=>'Comprovante é Obrigatório',
            'comprovatePublicacao.*.data.required'=>'Data da Publicação é Obrigatório',
            'comprovatePublicacao.*.local.required'=>'Local da Publicação é Obrigatório',
            'comprovatePublicacao.*.anexo.required'=>'Gentileza anexar comprovante',
            'DisciplinasMinistradas.*.disciplina.required'=>'Disciplinas Ministradas é obrigatório',
            'DisciplinasMinistradas.*.cargaHoraria.required'=>'Carga horária das Disciolinas ministrada é obrigatório',
            'DisciplinasMinistradasOutrosCursos.*.curso.required'=>'Curos é obrigatório',
            'DisciplinasMinistradasOutrosCursos.*.disciplina.required'=>'Disciplina é obrigatório',
            'DisciplinasMinistradasOutrosCursos.*.cargaHoraria.required'=>'Carga horária é Obrigatória',

        ];
    }

}
