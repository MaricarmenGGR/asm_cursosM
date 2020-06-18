<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserSchool extends Model
{
    protected $table = 'datos_escolares';
    protected $fillable = [
        'id_user','Primaria','Secundaria','Prepa','cTecnica','cProfesional',
        'nCTecnica','nCProfesional','diplomados','noCedula','Maestrias','cursosExtra','hCapacidades','habilidadesDesc'
    ];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
