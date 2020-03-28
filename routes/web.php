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


Route::get('/cursos', 'CursosController@index')->name('cursos');

Route::get('/usuarios', 'UsuariosController@index')->name('usuarios');
/*
Route::get('/cursos', function () {
    return view('cursos.curso');
})->name('cursos')->middleware('auth');
*/
Route::get('/cursos2', function () {
    return view('cursos.curso2');
})->name('cursos2')->middleware('auth');
