<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use App\Examen_Preguntas;
use App\Examen_Respuestas;
use App\Examen_Usuario;
use App\Examen_Usuario_Respuestas;

class Examen extends Model
{
    protected $table = 'examen';
    protected $fillable = [
        'id','curso_id','fechaActivar','fechaDesactivar'
    ];
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function tienePreguntas($examen_id){
        $result = Examen::findOrFail($examen_id)->get();

        if (!$result->isEmpty()) return true; //TIENE PREGUNTAS
        else return false; //NO TIENE PREGUNTAS
    }

    public function obtenerPreguntas($examen_id){
        $result = Examen_Preguntas::where('examen_id','=',$examen_id)->get();
        return $result;
    }

    public function estaActivado($examen_id){
        $result = Examen::findOrFail($examen_id);
        if( $result->fechaActivar == null ){
            return false; //ESTÁ ACTIVADO
        } else {
            return true; //ESTA DESACTIVADO
        }
    }

    public function vencioLimite($examen_id){
        date_default_timezone_set('America/Mexico_City');
        $result = Examen::findOrFail($examen_id);
        if( strtotime(date("d-m-Y H:i:s",time())) > strtotime($result->fechaDesactivar." 23:59:00") ) return true; //VENCIO
        else return false; //NO VENCIO
    }

    public function estaContestado($examen_id,$user_id){
        $result = Examen_Usuario::where('examen_id', '=', $examen_id)
        ->where('user_id', '=', $user_id)
        ->get();

        if (!$result->isEmpty()){
            foreach( $result as $r ){
                $res = $r;
            }
            return $r;
        }
        else return null;
    }

    public function haSidoContestado($examen_id){
        $result = Examen_Usuario::where('examen_id', '=', $examen_id)->get();
        if (!$result->isEmpty()) return true; // HA SIDO CONTESTADO
        else return false; //NO HA SIDO CONTESTADO
    }


}
