<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'cursos';
    protected  $fillable = [
        'tipoCurso',
        'modalidade',
        'denominacaoCurso',
        'habilitacao',
        'localOferta',
        'turnoFuncionamento',
        'vagaTurno',
        'cargaHorariaCurso',
        'regimeLetivo',
        'periodos',
        'coordenador_id'
    ];

    protected $guarded = [
        'id'
    ];

    function coordenador(){
        return $this->belongsTo('App\Coordenador','coordenador_id')->withTrashed();
    }
}
