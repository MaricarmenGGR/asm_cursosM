<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
    protected $table = 'cursos';
    protected $fillable = [
        'id','nombreCurso','modalidad_id','lugar','fechaInicio','fechaFin','descripcionCurso','horaIncio','horaFin','horasTotales',
        'nombrePonente','infoPonente','status_id','publicar'
    ]; 
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
