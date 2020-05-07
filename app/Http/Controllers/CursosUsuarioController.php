<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Curso;
use App\Curso_Usuario;
use App\Curso_Area;

class CursosUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        $vars = [
            'curso' => Curso::findOrFail($id),
        ];
        return view('cursos.cursoUser', $vars);
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

    // PARA INSCRIBIRSE
    public function inscribirse(Request $request){
        //'id','user_id','curso_id','status_id','acreditado','fecha_acreditado'
        
        Curso_Usuario::create([
            'user_id' => Auth::user()->id,
            'curso_id' => $request->idCurso,
            'status_id' => 1,
            'acreditado' => 0,
            'fecha_acreditado' => null
        ]);
        $cupo = Curso_Area::where('curso_id', '=', $request->idCurso)
        ->where('area_id', '=', Auth::user()->area_id)
        ->first();
        
        $cupo->disponible = $cupo->disponible - 1;
        $cupo->update();

        return redirect()->route('cursosUsuario.show',$request->idCurso);
    }
}
