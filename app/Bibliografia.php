<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bibliografia extends Model
{
    protected $table = 'bibliografias';

    protected $fillable = [
        'planoDeEnsino_id',
        'aula',
        'titulo',
        'autor',
        'isbn',
        'ano',
        'editora',
    ];

    protected $guarded = [
        'id'
    ];

    public function planoDeEnsino(){
        return $this->belongsTo('App\PlanoDeEnsino','planoDeEnsino_id');
    }
}
