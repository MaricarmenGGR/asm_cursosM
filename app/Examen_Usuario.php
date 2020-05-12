<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examen_Usuario extends Model
{
    protected $table = 'examen_usuario';
    protected $fillable = [
        'id','examen_id','user_id','terminado',
    ];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
