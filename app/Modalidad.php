<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modalidad extends Model
{
    protected $table = 'modalidades';
    protected $fillable = [
        'id','nombre'
    ];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
