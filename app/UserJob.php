<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserJob extends Model
{
    protected $table = 'datos_laborales';
    protected $fillable = [
        'id_user','fechaIngreso','nombramiento','tipoTrabajador','actActuales','actActualesDesc',
        'responsabilidades','Puesto','descPuesto','cursoInduccion','cursoInduccionDesc','cargosAnt','trabajosExt',
    ];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
