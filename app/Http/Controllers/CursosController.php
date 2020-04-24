<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Area;
use App\Curso;
use App\Curso_Area;
use App\Curso_Usuario;
use App\Modalidad;
use Illuminate\Support\Facades\DB;

class CursosController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::get();
        /*$cursos = DB::table('cursos')
        ->leftJoin('curso_areas', 'curso_areas.curso_id', '=', 'cursos.id')
        ->select('curso_areas.area_id', 'curso_areas.curso_id', 'cursos.*')
        ->get();*/
        $vars = [ 
            'cursos' => $cursos,
        ];
        return view('cursos.index',$vars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::get();
        $modalidades = Modalidad::get();
        $vars = [
            'areas' => $areas,
            'modalidades' => $modalidades
        ];
        return view('cursos.crear', $vars);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Curso::create([
            'nombreCurso' => $request->nombreCurso,
            'modalidad_id' => $request->modalidad,
            'lugar' => $request->lugar, 
            'fechaInicio' => $request->fechaInicio,
            'fechaFin' => $request->fechaFin,
            'descripcionCurso' => $request->descripcionCurso,
            'horaIncio' => $request->horaIncio,
            'horaFin' => $request->horaFin,
            'horasTotales' => $request->horasTotales,
            'nombrePonente' => $request->nombrePonente,
            'infoPonente' => $request->infoPonente,
            'status_id' => 1,
            'publicar' => 0
        ]);

        $ultimaTupla = DB::table('cursos')->latest('id')->first();        

        $areas = $request->input('area');
        $cupos = $request->input('cupo');
        $ccupos = array();

        foreach($cupos as $cupo){
            if($cupo != "" || $cupo != '') array_push($ccupos, $cupo);
        }

        $reques = "";
        $my_array = array_combine($areas, $ccupos);
        foreach ($my_array as $area => $cupo) {
            Curso_Area::create([
                'curso_id' => $ultimaTupla->id,
                'area_id' => $area,
                'capacidad' => $cupo,
                'disponible' => $cupo
            ]);
        }
        
        return redirect()->route('cursos.show',$ultimaTupla->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $areas = DB::table('curso_areas')
        ->leftJoin('areas', 'curso_areas.area_id', '=', 'areas.id')
        ->select('curso_areas.*', 'areas.*')
        ->where('curso_areas.curso_id', '=', $id)
        ->get();

        $inscritos = DB::table('users')
        ->leftJoin('curso_usuarios', 'curso_usuarios.user_id', '=', 'users.id')
        ->leftJoin('areas', 'areas.id', '=', 'users.area_id')
        ->select('curso_usuarios.*', 'users.*', 'areas.*')
        ->where('curso_usuarios.curso_id', '=', $id)
        ->get();

        $vars = [
            'curso' => Curso::findOrFail($id),
            'areas' => $areas,
            'inscritos' => $inscritos
        ];
        return view('cursos.curso', $vars);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $areas = DB::table('curso_areas')
        ->leftJoin('areas', 'curso_areas.area_id', '=', 'areas.id')
        ->select('curso_areas.*', 'areas.*')
        ->where('curso_areas.curso_id', '=', $id)
        ->get();

        $inscritos = DB::table('users')
        ->leftJoin('curso_usuarios', 'curso_usuarios.user_id', '=', 'users.id')
        ->leftJoin('areas', 'areas.id', '=', 'users.area_id')
        ->select('curso_usuarios.*', 'users.*', 'areas.*')
        ->where('curso_usuarios.curso_id', '=', $id)
        ->get();

        $vars = [
            'curso' => Curso::findOrFail($id),
            'areas' => $areas,
            'inscritos' => $inscritos
        ];
        return view('cursos.edit', $vars);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curso $curso)
    {
        $curso->Fill($request->all());
        $curso->save();
        $id = $curso->id;
        $areas = DB::table('curso_areas')
        ->leftJoin('areas', 'curso_areas.area_id', '=', 'areas.id')
        ->select('curso_areas.*', 'areas.*')
        ->where('curso_areas.curso_id', '=', $id)
        ->get();

        $inscritos = DB::table('users')
        ->leftJoin('curso_usuarios', 'curso_usuarios.user_id', '=', 'users.id')
        ->leftJoin('areas', 'areas.id', '=', 'users.area_id')
        ->select('curso_usuarios.*', 'users.*', 'areas.*')
        ->where('curso_usuarios.curso_id', '=', $id)
        ->get();

        $vars = [
            'curso' => Curso::findOrFail($id),
            'areas' => $areas,
            'inscritos' => $inscritos
        ];
        return view('cursos.curso', $vars);
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
}
