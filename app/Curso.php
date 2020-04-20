<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
    protected $table = 'cursos';
    protected $fillable = [
        'id','nombre','fecha_inicio','fecha_fin','horas','modalidad','lugar','ponente','info_ponente',
        'status_id','publicar'
    ];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
