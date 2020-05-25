<?php

namespace App\Http\Controllers;

use App\Evaluacion;
use App\Http\Controllers\Controller;
use App\Respuestas_Evaluacion_Ponente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvaluacionPonenteController extends Controller
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
                Evaluacion::create([
                    'curso_id' =>$request->curso_id,
                    'fechaEmision' => $request->fechaEmision,
                    'fechaTermino'=>$request->fechaTermino
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
        
        $fecha = DB::table('evaluacion_curso')
        ->where('curso_id', '=',$id)
        ->delete(); 
       // $actividades->delete($id);
        
        //Programa_Curso::destroy($id);
        return response()->json(
           ["mensaje"=> $fecha]
        );
    }
    public function Fechas($id){
        $fechas = DB::table('evaluacion_curso')
        ->where('curso_id', '=',$id)
        ->select('fechaEmision','fechaTermino')
        ->get();
        return response()->json(
            $fechas
        );
    }

    public function saveRespuesta(Request $request){
        if($request->ajax()){
            return response()->json([
                Respuestas_Evaluacion_Ponente::create([
                    'curso_id' =>$request->curso_id,
                    'user_id' => $request->user_id,
                    'Excelente'=>$request->Excelente,
                    'Bueno'=>$request->Bueno,
                    'Regular'=>$request->Regular,
                    'Deficiente'=>$request->Deficiente,
                    'Comentarios'=>$request->Comentarios,
                ])
            ]);
        }
    }
}
