<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanoDeEnsino extends Model
{
    protected $table = 'plano_de_ensinos';

    protected $fillable = [
        'curso_id',
        'professor_id',
        'disciplina_id',
        'ano',
        'semestre',
        'ementa',
        'competenciaHabilidades',
        'metodologiaDeEnsino',
        'avaliacao',
        'cargaHorariaSemestral',
        'periodoDoCurso'
    ];

    protected $guarded = [
        'id'
    ];

    public function cronogramaAtividade(){
        return $this->hasMany('App\CronogramaDeAtividades','planoDeEnsino_id','id');
    }
    public function bibliografia(){
        return $this->hasMany('App\Bibliografia','planoDeEnsino_id','id');
    }

    public function professor(){
        return $this->hasOne('App\Professor','id','professor_id');
    }

    public function disciplina(){
        return $this->hasOne('App\Disciplina','id','disciplina_id');
    }

    public function curso(){
        return $this->hasOne('App\Curso','id','curso_id');
    }
}
