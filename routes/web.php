<?php

use Illuminate\Support\Facades\Route;

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
Route::resource('evaluacion','EvaluacionPonenteController');
Route::get('/cursos', 'CursosController@index')->name('cursos');
Route::get('/verCurso', 'CursosController@show')->name('verCurso');
Route::get('/crearCurso', 'CursosController@create')->name('crearCurso');
Route::get('/download/{id}' , 'MaterialCursoController@descargarMaterial');

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
Route::post('/agregarRespuesta','EvaluacionPonenteController@saveRespuesta');

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
