<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\UserJob;
use App\UserMedic;
use App\UserSchool;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function __construct()
    {
        //$this->middleware(['admin','user']);
        //$this->middleware('user')->only('profile');
        //$this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios=User::get();
        return view('usuarios.index',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'apPaterno' => $request->apPaterno,
            'apMaterno' => $request->apMaterno,
            'edad' => $request->edad,
            'sexo' => $request->sexo,
            'edoCivil' => $request->edoCivil,
            'calle' => $request->calle,
            'colonia' => $request->colonia,
            'nCasa' => $request->nCasa,
            'telfono' => $request->telfono,
            'curp' => $request->curp,
            'nHijos' =>$request->nHijos,
            'email' => $request->email,
            'role_id' => 2,
            'password' => Hash::make($request->password),
            'area_id' => $request->area_id,
        ]);

        //$id_user = User::latest('id')->first();
        $ultimaTupla = DB::table('users')->latest('id')->first(); 

        UserMedic:: create([
            'id_user'=>$ultimaTupla->id,
            'tipoSangre'=>$request->tipoSangre,
            'noImss'=>$request->noImss,
            'nombreEmergencia'=>$request->nombreEmergencia,
            'telEmergencia'=>$request->telEmergencia,
            'parentesco'=>$request->parentesco,
            'alergias'=>$request->alergias,
            'enfermedades'=>$request->enfermedades,
        ]);

        UserSchool::create([
            'id_user'=>$ultimaTupla->id,
            'Primaria'=>$request->Primaria,
            'Secundaria'=>$request->Secundaria,
            'Prepa'=>$request->Prepa,
            'cTecnica'=>$request->cTecnica,
            'cProfesional'=>$request->cProfesional,
            'nCTecnica'=>$request->nCTecnica,
            'nCProfesional'=>$request->nCProfesional,
            'diplomados'=>$request->diplomados,
            'noCedula'=>$request->noCedula,
            'Maestrias'=>$request->Maestrias,
            'cursosExtra'=>$request->cursosExtra,
            'hCapacidades'=>$request->hCapacidades,
            'habilidadesDesc'=>$request->habilidadesDesc,
        ]);

        UserJob::create([
            'id_user'=>$ultimaTupla->id,
            'fechaIngreso'=>$request->fechaIngreso,
            'nombramiento'=>$request->nombramiento,
            'tipoTrabajador'=>$request->tipoTrabajador,
            'actActuales'=>$request->actActuales,
            'actActualesDesc'=>$request->actActualesDesc,
            'responsabilidades'=>$request->responsabilidades,
            'Puesto'=>$request->Puesto,
            'descPuesto'=>$request->descPuesto,
            'cursoInduccion'=>$request->cursoInduccion,
            'cursoInduccionDesc'=>$request->cursoInduccionDesc,
            'cargosAnt'=>$request->cargosAnt,
            'trabajosExt'=>$request->trabajosExt,
        ]);
        return view('auth.login');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //VER INFO DEL PERFIL DESDE AQUI
    public function show($id)
    {
        $rol=Role::get();
        $user=User::findOrFail($id);
        return view('usuarios.show',
            ['usuario'=>$user,
             'rol'=>$rol
            ]
        );
    }

    public function profile($id)
    {
        if(Auth::user()->id == $id){
            $rol=Role::get();
            $user=User::findOrFail($id);
            return view('usuarios.show',
                ['usuario'=>$user,
                'rol'=>$rol
                ]
            );
        } else {
            return view('home');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function perfil()
    {
        return view('usuarios.perfil');
    }
}
