<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cuestionario extends Model
{
    protected $table = 'cuestionarios';
    protected $fillable = [
        'id','curso_id','pregunta_1','pregunta_2','pregunta_3','pregunta_4','pregunta_5'
    ];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
