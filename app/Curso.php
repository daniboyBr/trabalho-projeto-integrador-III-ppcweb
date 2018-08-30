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
        'periodos'
    ];
}
