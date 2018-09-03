<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coordenador extends Model
{

    use SoftDeletes;

    protected $table = 'coordenadors';
    protected $fillable = [
        'nomeCoordenador',
        'cpfCoordenador',
        'titulacaoCoordenador',
        'tempoDedicacaoCoordenador'
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    protected $date = [
        'deleted_at'
    ];

}
