<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use App\Examen_Respuestas;

class Examen_Preguntas extends Model
{
    protected $table = 'examen_preguntas';
    protected $fillable = [
        'id','examen_id','preguntaTxt'
    ];
    use SoftDeletes;
    protected $dates = ['deleted_at'];


    public function tieneRespuestas( $pregunta_id ){
        $result = DB::table('examen_respuestas')
        ->where('pregunta_id', '=', $pregunta_id)
        ->get();

        if (!$result->isEmpty()) return true; //TIENE PREGUNTAS
        else return false; //NO TIENE PREGUNTAS
    }

    public function obtenerRespuestas( $pregunta_id ){
        $result = Examen_Respuestas::where('pregunta_id','=',$pregunta_id)->get();
        return $result;
    }


}
