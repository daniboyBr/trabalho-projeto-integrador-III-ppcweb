<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnexosComprovantes extends Model
{
    protected $table = 'anexos';

    protected $fillable = [
        'comprovante',
        'data',
        'local',
        'arquivo',
        'tipoComprovante',
        'professor_id',
    ];

    public function professor(){
        return $this->belongsTo('App\Professor','professor_id');
    }
}
