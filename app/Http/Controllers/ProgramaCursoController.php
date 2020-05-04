<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Area;
use App\Curso;
use App\Curso_Area;
use App\Curso_Usuario;
use App\Modalidad;
use App\Material;
use App\Programa_Curso;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use function GuzzleHttp\Promise\all;

class ProgramaCursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if($request->ajax()){
            return response()->json([
                Programa_Curso::create([
                    'curso_id' =>$request->curso_id,
                    'actividad' => $request->actividad,
                    'hora'=>$request->hora,
                    'material'=>$request->material
                ])
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $actividades = DB::table('programa_cursos')
        ->where('id', '=',$id)
        ->delete(); 
       // $actividades->delete($id);
        
        //Programa_Curso::destroy($id);
        return response()->json(
           ["mensaje"=> $actividades]
        );
    }

    public function listar($id){
        $actividades = DB::table('programa_cursos')
        ->where('curso_id', '=',$id)
        ->select('*')
        ->get();
        return response()->json(
            $actividades->toArray()
        );
    }
}
