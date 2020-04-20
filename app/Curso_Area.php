<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso_Area extends Model
{
    protected $table = 'curso-areas';
    protected $fillable = [
        'id','curso_id','area_id','capacidad','disponible'
    ];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
