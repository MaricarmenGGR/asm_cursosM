<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cuestionario_Respuestas extends Model
{
    protected $table = 'cuestionario_respuestas';
    protected $fillable = [
        'id','user_id','cuestionario_id','respuesta_1','respuesta_2','respuesta_3','respuesta_4','respuesta_5'
    ];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
