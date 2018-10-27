<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return redirect('/');
});

Route::post('cursos/disciplinas/add', 'CursoController@addDisciplinas');
Route::delete('cursos/disciplinas/remove', 'CursoController@removeDisciplinas');
Route::resource('cursos', 'CursoController');
Route::post('coordenador/restore', 'CoordenadorController@restore');
Route::delete('coordenador/remove', 'CoordenadorController@remove');
Route::resource('coordenador', 'CoordenadorController');
Route::resource('disciplinas', 'DisciplinasController');
Route::resource('professor', 'ProfessorController');
Route::get('professor/anexo/download/{arquivo}', 'ProfessorController@downloadAnexo');
Route::resource('cadastroppc', 'CadastroppcController');

