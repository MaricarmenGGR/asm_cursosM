<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asistencia extends Model
{
    protected $table = 'asistencias';
    protected $fillable = [
        'id','user_id','curso_id','fecha','entrada','salida'
    ];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
