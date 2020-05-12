<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examen_Preguntas extends Model
{
    protected $table = 'examen_preguntas';
    protected $fillable = [
        'id','examen_id','preguntaTxt'
    ];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
