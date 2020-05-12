<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examen_Usuario_Respuestas extends Model
{
    protected $table = 'examen_usuario_respuestas';
    protected $fillable = [
        'id','examen_usuario_id','pregunta_id','respuesta_id',
    ];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
