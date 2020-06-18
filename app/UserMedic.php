<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserMedic extends Model
{
    protected $table = 'datos_medicos';
    protected $fillable = [
        'id_user','tipoSangre','noImss','nombreEmergencia','telEmergencia','parentesco',
        'alergias','enfermedades',
    ];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
