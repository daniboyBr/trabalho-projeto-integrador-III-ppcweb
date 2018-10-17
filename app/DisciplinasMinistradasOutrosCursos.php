<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DisciplinasMinistradasOutrosCursos extends Model
{
    protected $table = 'disciplinas_ministradas_outros_cursos';

    protected $fillable = [
        'disciplina',
        'cargaHoraria',
        'professor_id',
        'curso'
    ];

    protected $guarded = [
        'id'
    ];

}
