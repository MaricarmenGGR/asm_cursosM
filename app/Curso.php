<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use App\Curso;

class Curso extends Model
{
    protected $table = 'cursos';
    protected $fillable = [
        'id','nombreCurso','modalidad_id','lugar','fechaInicio','fechaFin','descripcionCurso','horaInicio','horaFin','horasTotales',
        'nombrePonente','infoPonente','imagenCurso','status_id','publicar'
    ]; 
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function verificarArea($curso, $area){ //Validar si el area enviada esta invitada al curso
        $result = DB::table('curso_areas')
        ->where('curso_id', '=', $curso)
        ->where('area_id', '=', $area)
        ->get();

        if (!$result->isEmpty()) return true;
        else return false;
    }

    public function verificarCupo($curso, $area){ //Validar si hay cupo
        $result = DB::table('curso_areas')
        ->where('curso_id', '=', $curso)
        ->where('area_id', '=', $area)
        ->where('disponible', '>', 0)
        ->get();

        if (!$result->isEmpty()) return true;
        else return false; //esta lleno
    }
}
