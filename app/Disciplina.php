<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $table = 'disciplinas';

    protected  $fillable = [
        'nomeDisciplina',
        'descricaoDisciplina',
        'cargaHorariaDisciplina',
        'codigoDisciplina',
        'semestreDisciplina',
    ];

    protected $guarded = [
        'id'
    ];

    function curso(){
        return $this->belongsToMany('App\Curso','curso_disciplina','disciplina_id', 'curso_id');
    }
}
