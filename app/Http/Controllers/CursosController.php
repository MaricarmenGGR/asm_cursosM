<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Area;
use App\Curso;
use App\Curso_Area;
use App\Curso_Usuario;
use App\Modalidad;
use App\User;
use App\Examen;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\PDF;
use Exception;
use SebastianBergmann\Environment\Console;

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
       /* $image = $request->imagenCurso;*/
        if ($request->hasFile('imagenCurso')) {
            $imagePath = $request->file('imagenCurso');
            $imageName = time() . '.' . $imagePath ->getClientOriginalExtension();

            $imagePath ->move('uploads', $imageName );
            /*$image->imagenCurso = $imageName;*/
        };

        Curso::create([
            'nombreCurso' => $request->nombreCurso,
            'modalidad_id' => $request->modalidad,
            'lugar' => $request->lugar, 
            'fechaInicio' => $request->fechaInicio,
            'fechaFin' => $request->fechaFin,
            'descripcionCurso' => $request->descripcionCurso,
            'horaInicio' => $request->horaInicio,
            'horaFin' => $request->horaFin,
            'horasTotales' => $request->horasTotales,
            'nombrePonente' => $request->nombrePonente,
            'infoPonente' => $request->infoPonente,
            'imagenCurso'=>$imageName,
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

        Examen::create([
            'curso_id' => $ultimaTupla->id,
        ]);
        
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
        /*$areas*/
        $curso = Curso::findOrFail($id);
        $vars = [
            'curso' => $curso->setAttribute('modalidad', Modalidad::findOrFail($curso->modalidad_id)->nombre),
            'modalidades' => Modalidad::get()
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
    public function destroy($id){
         //Borrar de materiales
        try {
            $nombreMaterial = DB::table('materiales')
            ->where('curso_id','=',$id)
            ->select('url')
            ->get();
            foreach($nombreMaterial as $archivo){
                $file = $archivo->url;
            unlink('materials/'.$file);
            }
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }

        try{
            //Borra de Uploads
            $imagenCurso = DB:: table('cursos')
            ->where('id','=',$id)
            ->select('imagenCurso')
            ->get();
            foreach($imagenCurso as $imagen){
                $file = $imagen->imagenCurso;
                unlink('uploads/'.$file);
            }
        } catch(Exception $e){
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }

        try{

        }catch(Exception $e){
            
        }
        //Borrar de Invitaciones
       $invitaciones = DB:: table('invitaciones')
        ->where('curso_id','=',$id)
        ->select('documento')
        ->get();
        foreach($invitaciones as $invitacion){
            $file = $invitacion->documento;
            unlink('invitaciones/'.$file);
        }
        
        
        $material = DB::table('materiales')
        ->where('curso_id', '=',$id)
        ->delete();

        $programaCurso = DB:: table('programa_cursos')
        ->where('curso_id','=',$id)
        ->select('*')
        ->delete();

        $areas = DB::table('curso_areas')
        ->leftJoin('areas', 'curso_areas.area_id', '=', 'areas.id')
        ->select('curso_areas.*', 'areas.*')
        ->where('curso_areas.curso_id', '=', $id)
        ->delete();   
        
        $inscritos = DB::table('curso_usuarios')
        ->where('curso_id','=',$id)
        ->select('*')
        ->delete();

        $evaluacionCurso = DB::table('evaluacion_curso')
        ->where('curso_id','=',$id)
        ->select('*')
        ->delete();

        $evalucionRespuestas = DB::table('evaluacion_respuestas')
        ->where('curso_id','=',$id)
        ->select('*')
        ->delete();

        $invitaciones = DB:: table('invitaciones')
        ->where('curso_id','=',$id)
        ->select('*')
        ->delete();

        $curso = DB:: table('cursos')
        ->where('id','=',$id)
        ->select('*')
        ->delete();

        return response()->json(
            ["mensaje"=> "Se borro el Curso"]
         );
        
    }

    

    public function getCInfo($id){
        $curso = Curso::findOrFail($id);
        $curso->setAttribute('modalidad', Modalidad::findOrFail($curso->modalidad_id)->nombre );
        return response()->json($curso);
    }
    public function updateCInfo(Request $request, $id){
        $curso = Curso::find($id);
        $curso->update($request->all());
        return response()->json($curso);
    }

    public function verAsistentes($id){
        $asistentes = DB::table('users')
        ->leftJoin('curso_usuarios', 'curso_usuarios.user_id', '=', 'users.id')
        ->leftJoin('areas', 'areas.id', '=', 'users.area_id')
        ->select('curso_usuarios.*', 'users.*', 'areas.*')
        ->where('curso_usuarios.curso_id', '=', $id)
        ->get();
        return response()->json(
            $asistentes->toArray()
        );
    }

    public function DescarganInfoCurso($id){
        $cursoDatos =  DB:: table('cursos')
        ->where('id', '=',$id)
        ->select('*')
        ->get();

        $programaCurso = DB:: table('programa_cursos')
        ->where('curso_id','=',$id)
        ->select('*')
        ->get();

        $materialCurso = DB:: table('materiales')
        ->where('curso_id','=',$id)
        ->select('*')
        ->get();

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
            'cursos' => $cursoDatos,
            'programas' => $programaCurso,
            'materiales' => $materialCurso,
            'areas' => $areas,
            'inscritos' =>$inscritos,
            
        ];

        $pdf = \PDF::loadView('informacionCurso',$vars);//Retorna una vista
        return $pdf->download('archivo.pdf');
        
    }


    public function showPrograma($id)
    {
        $curso = Curso::findOrFail($id);
        $vars = [
            'curso' => $curso
        ];
        return view('cursos.curso2_programa', $vars);
    }
    public function showMaterial($id)
    {
        $curso = Curso::findOrFail($id);
        $vars = [
            'curso' => $curso
        ];
        return view('cursos.curso3_material', $vars);
    }
    public function showEvaluacion($id)
    {
        $curso = Curso::findOrFail($id);
        $curso->setAttribute('examen', Examen::where('curso_id', '=', $id)->firstOrFail() );

        $vars = [
            'curso' => $curso
        ];
        return view('cursos.curso4_evaluaciones', $vars);
    }
    public function showAsistencia($id)
    {
        $curso = Curso::findOrFail($id);
        
        $inscritos = DB::table('users')
        ->leftJoin('curso_usuarios', 'curso_usuarios.user_id', '=', 'users.id')
        ->leftJoin('areas', 'areas.id', '=', 'users.area_id')
        ->select('curso_usuarios.*', 'users.*', 'areas.*')
        ->where('curso_usuarios.curso_id', '=', $id)
        ->whereNull('curso_usuarios.deleted_at')
        ->get();

        $vars = [
            'curso' => $curso->setAttribute('modalidad', Modalidad::findOrFail($curso->modalidad_id)->nombre),
            'inscritos' => $inscritos,
            'modalidades' => Modalidad::get()
        ];
        return view('cursos.curso5_asistencia', $vars);
    }
    public function showInvitacion($id)
    {
        $areas = Area::all();
        $curso = Curso::findOrFail($id);
        $vars = [
            'curso' => $curso->setAttribute('modalidad', Modalidad::findOrFail($curso->modalidad_id)->nombre),
            'areas' => $areas,
            'modalidades' => Modalidad::get()
        ];
        return view('cursos.curso6_invitacion', $vars);
    }
    public function showResultados($id)
    {
        $curso = Curso::findOrFail($id);
        $vars = [
            'curso' => $curso
        ];
        return view('cursos.curso7_resultados', $vars);
    }


    public function editarAreas(Request $request, $id)
    {
        
        //$id = $request->input('curso_id');
        
        DB::table('curso_areas')->where('curso_id', '=', $id)->delete();

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
                'curso_id' => $id,
                'area_id' => $area,
                'capacidad' => $cupo,
                'disponible' => $cupo
            ]);
        }

        $areas = Area::all();
        $curso = Curso::findOrFail($id);
        $vars = [
            'curso' => $curso->setAttribute('modalidad', Modalidad::findOrFail($curso->modalidad_id)->nombre),
            'areas' => $areas,
            'modalidades' => Modalidad::get()
        ];

        return view('cursos.curso6_invitacion', $vars);
    }
}
