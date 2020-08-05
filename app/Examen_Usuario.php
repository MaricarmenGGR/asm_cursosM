<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Examen_Usuario_Respuestas;

class Examen_Usuario extends Model
{
    protected $table = 'examen_usuario';
    protected $fillable = [
        'id','examen_id','user_id','terminado','aciertos','calificacion'
    ];
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    function obtenerContestacionUsuario( $examen_usuario_id, $pregunta_id, $respuesta_id ){
        $result = Examen_Usuario_Respuestas::where('examen_usuario_id', '=', $examen_usuario_id)
        ->where('pregunta_id', '=', $pregunta_id)
        ->where('respuesta_id', '=', $respuesta_id)
        ->get();


        foreach($result as $r){
            return $r;
        }
    }
}
