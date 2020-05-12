<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examen_Respuestas extends Model
{
    protected $table = 'examen_respuestas';
    protected $fillable = [
        'id','pregunta_id','respuestaTxt',
    ];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
