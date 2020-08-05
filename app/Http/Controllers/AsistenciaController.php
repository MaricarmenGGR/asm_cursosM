<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asistencia;

class AsistenciaController extends Controller
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
        //
    }

    public function registrarEntrada(Request $request){
        $result = Asistencia::where('curso_id','=',$request->curso_id)
        ->where('user_id','=',$request->user_id)
        ->get();

        if( $result->isEmpty() ){
            Asistencia::create([
                'user_id' => $request->user_id,
                'curso_id' => $request->curso_id,
                'fecha' => date('Y-m-d'),
                'entrada' => date('H:i:s')
            ]);
        } else {

        }

    }

    public function registrarSalida(Request $request){
        $result = Asistencia::where('curso_id','=',$request->curso_id)
        ->where('user_id','=',$request->user_id)->first();

        if( $result->salida == null ){
            $result->update([
                'salida' => date('H:i:s')
            ]);
        }

    }
}
