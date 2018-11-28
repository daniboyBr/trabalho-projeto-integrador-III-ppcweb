<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cadastroppc extends Model
{
    protected $fillable = [
        'curso_id',
        'ppcCursoPerfil',
        'ppcEgressoPerfil',
        'ppcAcessoCurso',
        'ppcRepresentacao',
        'ppcAvalEnsino',
        'ppcAvalProjetoCurso',
        'ppcTcc',
        'ppcEstagio',
        'ppcPda',
    ];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'cadastroppcs';
    
    public function cursos(){
    return $this->belongsTo('App\Curso','curso_id');
    }
}
