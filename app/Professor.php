<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $table = 'professors';

    protected $fillable = [
        'nomeProfessor',
        'cpfProfessor',
        'maiorTitulacao',
        'areaFormacao',
        'curriculoLates',
        'dataAtualizacaoCurriculo',
        'matriculaProfessor',
        'dataAdmissao',
        'horasNDE',
        'horasOrientacaoTCC',
        'horasCoordenacaoCurso',
        'horasCoordenacaoOutrosCursos',
        'horasPesquisaSmAtual',
        'horasAtividadeExtraClasse',
        'horasAtividadeExtClasseOutrosCursos',
        'qtdHorasCurso',
        'qtdHorasOutrosCurso',
        'membroNDE',
        'membroColegiado',
        'docenteFCEP',
        'tempoVinculo',
        'tempoCursosEAD',
        'tempoExpMagisterioSuperior',
        'tempoExpProfissional',
        'qtdParicipacaoEventos',
        'qtdArtigosNaArea',
        'qtdArtigosOutrasAreas',
        'qtdLivrosNaArea',
        'qtdLivrosOutrasAreas',
        'qtdTrabalhosEmAnaisCompletos',
        'qtdTrabalhosEmAnaisResumo',
        'qtdPropriedadeIntelectualDepositada',
        'qtdPropriedadeIntelectualRegistrada',
        'qtdTraducoes',
        'qtdProjetosArtiticosCulturais',
        'qtdProducaoDidaticoPedagogica'
    ];

    protected $guarded = [
        'id'
    ];

    public function disciplinasMinistradas(){
        return $this->hasMany('App\DisciplinasMinistradas','professor_id','id');
    }

    public function disciplinasMinistradasOutrosCursos(){
        return $this->hasMany('App\DisciplinasMinistradasOutrosCursos','professor_id','id');
    }
    public function anexoComprovantes(){
        return $this->hasMany('App\AnexosComprovantes','professor_id','id');
    }
}
