<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Curso;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'name','apPaterno','apMaterno','edad','sexo','edoCivil','calle','colonia','nCasa','telfono',
        'curp','nHijos','cargo','puesto','dependencia','email','role_id','password','area_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
        //return $this->belongsTo('App\Role','role_id','id');
    }

    public function area(){
        return $this->belongsTo('App\Area');
        //return $this->belongsTo('App\Role','role_id','id');
    }

    public function estaInscrito($id){
        $result = DB::table('curso_usuarios')
        ->where('curso_id', '=', $id)
        ->where('user_id', '=', Auth::user()->id)
        ->get();
        
        if (!$result->isEmpty()) return true;
        else return false;
        //SELECT * FROM curso_usuarios WHERE curso_id = 1 AND user_id = 2
    }
}
