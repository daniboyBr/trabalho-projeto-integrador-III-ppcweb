<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DisciplinasMinistradas extends Model
{
    protected $table = 'disciplinas_ministradas_curso';

    protected $fillable = [
        'disciplina',
        'cargaHoraria',
        'professor_id',
    ];

    protected $guarded = [
        'id'
    ];

    public function professor(){
        return $this->belongsTo('App\Professor','professor_id');
    }
}
