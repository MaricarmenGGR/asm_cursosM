<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Respuestas_Evaluacion_Ponente extends Model
{
    protected $table = 'evaluacion_respuestas';
    protected $fillable = [
        'id','curso_id','user_id','Excelente','Bueno','Regular','Deficiente','Comentarios'
    ];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}