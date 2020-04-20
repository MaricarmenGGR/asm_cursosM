<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    protected $table = 'areas';
    protected $fillable = [
        'id','nombre'
    ];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
