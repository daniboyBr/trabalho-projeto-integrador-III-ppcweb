<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CronogramaDeAtividades extends Model
{
    protected $table = 'cronograma_de_atividades';

    protected $fillable = [
        'planoDeEnsino_id',
        'aula',
        'conteudo',
    ];

    protected $guarded = [
        'id'
    ];

    public function planoDeEnsino(){
        return $this->belongsTo('App\PlanoDeEnsino','planoDeEnsino_id');
    }
}
