<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invitacion_Area extends Model
{
    protected $table = 'invitacion_areas';
    protected $fillable = [
        'id','curso_id','user_id','enterado'
    ];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
