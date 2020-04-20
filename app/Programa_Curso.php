<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Programa_Curso extends Model
{
    protected $table = 'programa-cursos';
    protected $fillable = [
        'id','curso_id','actividad','hora'
    ];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
