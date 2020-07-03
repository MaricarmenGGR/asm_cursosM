<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use App\Curso;
use App\Http\Controllers\UsuariosController;
use App\Programa_Curso;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

*/


Route::get('/', 'HomeController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//////////////////////////// RUTAS CURSOS (ADMINS) ////////////////////////////////
Route::resource('cursos','CursosController');
Route::resource('materiales','MaterialCursoController');
Route::resource('invitacion','InvitacionController');
Route::resource('programas','ProgramaCursoController');
Route::resource('examenes','ExamenCursoController');
Route::resource('usuarios','UsuariosController');
Route::resource('evaluacion','EvaluacionPonenteController');

Route::get('/cursos', 'CursosController@index')->name('cursos');
Route::get('/verCurso', 'CursosController@show')->name('verCurso');
Route::get('/crearCurso', 'CursosController@create')->name('crearCurso');
Route::get('/download/{id}' , 'MaterialCursoController@descargarMaterial');


Route::get('/{id}/programa', 'CursosController@showPrograma');
Route::get('/{id}/material', 'CursosController@showMaterial');
Route::get('/{id}/evaluacion', 'CursosController@showEvaluacion');
Route::get('/{id}/asistencia', 'CursosController@showAsistencia');
Route::get('/{id}/invitacion', 'CursosController@showInvitacion');
Route::get('/{id}/resultados', 'CursosController@showResultados');

//CRUD AJAX
Route::get('/getCInfo/{id}', 'CursosController@getCInfo');
Route::put('/updateCInfo/{id}', 'CursosController@updateCInfo');
Route::get('/listar/{id}','ProgramaCursoController@listar');
Route::delete('/borrarAct/{id}','ProgramaCursoController@destroy');
Route::get('/verMateriales/{id}','MaterialCursoController@verMateriales');
Route::get('/fechas/{id}','EvaluacionPonenteController@Fechas');
Route::delete('/borrarMaterial/{id}','MaterialCursoController@destroy');
Route::delete('/desactivarEvaluacion/{id}','EvaluacionPonenteController@destroy');
Route::get('/verAsistentes/{id}', 'CursosController@verAsistentes');
Route::get('/verificarRespuestas/{id_curso}/{id_user}','EvaluacionPonenteController@verificaRespuestaUsuario');
Route::get('/resultadosGrafica/{id}','EvaluacionPonenteController@respuestaCursoGrafica');
Route::post('/agregarRespuesta','EvaluacionPonenteController@saveRespuesta');
Route::get('/pdfCurso/{id}','CursosController@DescarganInfoCurso');
Route::delete('/borrarCurso/{id}','CursosController@destroy');
Route::post('/editarAreas/{id}', 'CursosController@editarAreas');

//////////////////////////// RUTAS CURSOS (USUARIOS) ////////////////////////////////
Route::resource('cursosUsuario','CursosUsuarioController');
Route::post('/inscribirse', 'CursosUsuarioController@inscribirse');

Route::resource('homeUser','UsuariosHomeController');

Route::resource('usuarios','UsuariosController');
Route::get('/verPerfil/{id}','UsuariosController@profile');
//Route::get('/usuarios', 'UsuariosController@index')->name('usuarios');
//Route::get('/perfil', 'UsuariosController@perfil')->name('perfil');
/*
Route::get('/cursos', function () { 
    return view('cursos.curso');
})->name('cursos')->middleware('auth');
*/
Route::get('/cursos2', function () {
    return view('cursos.curso2');
})->name('cursos2')->middleware('auth');

Route::get('/pdf', function(){
    $cursos = Curso::all();
    $programas = Programa_Curso::all();
});

/*Route::get('/registro',function(){
    return view('auth.register');
});*/

Route::get('/registro',function(){
    return view('usuarios.registro');
});
