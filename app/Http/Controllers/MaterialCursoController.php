<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Area;
use App\Curso;
use App\Curso_Area;
use App\Curso_Usuario;
use App\Material;
use App\Modalidad;
use Illuminate\Support\Facades\DB;

class MaterialCursoController extends Controller
{
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
        //$ultimaTupla = DB::table('cursos')->latest('id')->first(); 
        /* $image = $request->imagenCurso;*/
       
        if ($request->hasFile('url')) {
            $filePath = $request->file('url');
            $fileName = time() . '.' . $filePath ->getClientOriginalExtension();

            $filePath ->move('materials', $fileName );
            /*$image->imagenCurso = $imageName;*/
        
        Material::create([
            'curso_id' =>$request->curso_id,
            'url' => $fileName
        ]);
        return redirect()->route('cursos.show',$request->curso_id);
    };
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
        //
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
}
