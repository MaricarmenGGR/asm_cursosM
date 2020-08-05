<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Examen_Usuario_Respuestas extends Model
{
    protected $table = 'examen_usuarios_respuestas';
    protected $fillable = [
        'id','examen_usuario_id','pregunta_id','respuesta_id','correcto'
    ];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
