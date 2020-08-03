<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use App\Examen_Preguntas;

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
        $result = Examen::findOrFail($examen_id)->first();
        if( $result->fechaActivar == null ){
            return false; //ESTÁ ACTIVADO
        } else {
            return true; //ESTA DESACTIVADO
        }
    }


}
