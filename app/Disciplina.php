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
        'curso_id',
    ];

    protected $guarded = [
        'id'
    ];

    function curso(){
        return $this->belongsTo('App\Curso','curso_id');
    }
}
