<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invitacion extends Model
{
    protected $table = 'invitaciones';
    protected $fillable = [
        'id','curso_id','documento'
    ];
    use SoftDeletes;
    protected $dates = ['deleted_at'];

}
