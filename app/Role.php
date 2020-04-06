<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'id','descripcion'
    ];
    protected $table = 'roles';
    protected $primaryKey = 'id';
}
