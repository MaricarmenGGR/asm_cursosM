<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Invitacion;
use App\Mail\InvitacionCursoASM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class InvitacionController extends Controller
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
            foreach($request->file('documento') as $archivo){
                 $fileName = time().$archivo->getClientOriginalName();
                 $archivo->move('invitaciones', $fileName );
                 Invitacion::create([
                     'curso_id' =>$request->curso_id,
                     'documento' => $fileName
                 ]);
             }
            return response()->json(
                [ Invitacion::where('curso_id','=',$request->curso_id) ] 
            );
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
        //
    }

    public function enviarInvitaciones(Request $request){

        $invitacion = DB::table('invitaciones')
        ->where('curso_id', '=',$request->curso_id)
        ->select('*')
        ->get();
        $invNva = $invitacion[0]->id;
        $Nvainvitacion = new Invitacion();
        $Nvainvitacion->id = $invitacion[0]->id;
        $Nvainvitacion->curso_id = $invitacion[0]->curso_id;
        $Nvainvitacion->documento = $invitacion[0]->documento;
        $nameDoc =  $Nvainvitacion->documento = $invitacion[0]->documento;
        $cadena = $request->correosInvitados;
        $curso_id = $request->curso_id;
        $arreglo = explode(",",$cadena);
        $i =0;
        foreach($arreglo as $correo){
            Mail :: to($correo)->send(new InvitacionCursoASM($Nvainvitacion,$nameDoc,$curso_id));
            $i++;
        }
        return $Nvainvitacion;
    }

    public function descargaInvitacion($documento){
        $documento = DB::table('invitacion')
        ->where('documento','=',$documento)
        ->select('*')
        ->get();
        $archivo = ($documento[0]->documento);
        $nombreArchivo = strval($archivo);
        $pathtoFile = 'invitaciones/'.$nombreArchivo;
      return response()->download($pathtoFile);
    }
}
