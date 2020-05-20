<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evaluacion extends Model
{
    protected $table = 'evaluacion_curso';
    protected $fillable = [
        'id','curso_id','fechaEmision','fechaTermino'
    ];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
