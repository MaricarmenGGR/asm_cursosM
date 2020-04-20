<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    protected $table = 'materiales';
    protected $fillable = [
        'id','curso_id','url'
    ];
    use SoftDeletes; 
    protected $dates = ['deleted_at'];
}
