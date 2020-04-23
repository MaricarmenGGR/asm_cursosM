<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Constancia extends Model
{
    protected $table = 'constancias';
    protected $fillable = [
        'id','curso_id','user_id','fecha_expedicion'
    ];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
