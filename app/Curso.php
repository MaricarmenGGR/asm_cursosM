<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Curso extends Model
{
    protected $table = 'cursos';
    protected $fillable = [
        'id','nombreCurso','modalidad_id','lugar','fechaInicio','fechaFin','descripcionCurso','horaIncio','horaFin','horasTotales',
        'nombrePonente','infoPonente','status_id','publicar'
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
}
