<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Examen_Respuestas;
use App\Examen_Preguntas;
use App\Examen;
use App\Curso;
use Illuminate\Support\Facades\DB;

class ExamenCursoController extends Controller
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
        //
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
        
    }

    public function crearPregunta(Request $request){
        Examen_Preguntas::create([
            'examen_id' => $request->examen_id,
            'preguntaTxt' => $request->preguntaTxt
        ]);
    }

    public function guardarRespuestas(Request $request){
        $respuestasTxt = $request->input('ctgtext');
        $respuestasRd = $request->input('ctgcorrecto');
        if( !isset( $respuestasTxt ) || !isset( $respuestasRd ) ){
            return response()->json(['error' => 'Error msg'], 404); // Status code here
        } else {
            $v = \Validator::make($request->all(), [
                "ctgtext.*" => "required|string",
                "ctgcorrecto" => "required"
            ]);
            if ($v->fails()) {
                return response()->json(['error' => 'Error msg'], 404); // Status code here
            } else {
                Examen_Respuestas::where('pregunta_id','=',$request->pregunta_id)->forceDelete();
                $contador=1;
                foreach( $respuestasTxt as $rt ){
                    if( $contador == $respuestasRd ){
                        Examen_Respuestas::create([
                            'pregunta_id' => $request->pregunta_id,
                            'respuestaTxt' => $rt,
                            'correcto' => 1
                        ]);
                    } else {
                        Examen_Respuestas::create([
                            'pregunta_id' => $request->pregunta_id,
                            'respuestaTxt' => $rt,
                            'correcto' => 0
                        ]);
                    }
                    $contador++;
                }
                
            }
        }
    }


    public function modificarPregunta(Request $request){
        Examen_Preguntas::findOrFail($request->pregunta_id)->update([
            'preguntaTxt' => $request->preguntaTxt
        ]);

    }

    public function borrarPregunta(Request $request){
        $result = Examen_Respuestas::where('pregunta_id','=',$request->pregunta_id)->get();
        if($result == null){
            Examen_Preguntas::findOrFail($request->pregunta_id)->forceDelete();
        } else {
            Examen_Respuestas::where('pregunta_id','=',$request->pregunta_id)->forceDelete();
            Examen_Preguntas::findOrFail($request->pregunta_id)->forceDelete();
        }
    }

    public function activarExamen(Request $request){
        Examen::findOrFail($request->examen_id)->update([
            'fechaActivar' => $request->fechaActivar,
            'fechaDesactivar' => $request->fechaDesactivar
        ]);
    }

    public function desactivarExamen(Request $request){
        Examen::findOrFail($request->examen_id)->update([
            'fechaActivar' => null,
            'fechaDesactivar' => null
        ]);
    }
    

}
