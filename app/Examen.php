<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Examen extends Model
{
    protected $table = 'examen';
    protected $fillable = [
        'id','curso_id','fechaActivar','fechaDesactivar'
    ];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
