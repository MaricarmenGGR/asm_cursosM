<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso_Usuario extends Model
{
    protected $table = 'curso_usuarios';
    protected $fillable = [
        'id','user_id','curso_id','status_id','acreditado','fecha_acreditado'
    ];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
