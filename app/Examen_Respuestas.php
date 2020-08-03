<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Examen_Respuestas extends Model
{
    protected $table = 'examen_respuestas';
    protected $fillable = [
        'id','pregunta_id','respuestaTxt','correcto',
    ];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
