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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return redirect('/');
})->middleware('auth');

Route::post('cursos/disciplinas/add', 'CursoController@addDisciplinas')->middleware('auth');
Route::delete('cursos/disciplinas/remove', 'CursoController@removeDisciplinas')->middleware('auth');
Route::resource('cursos', 'CursoController')->middleware('auth');
Route::post('coordenador/restore', 'CoordenadorController@restore')->middleware('auth');
Route::delete('coordenador/remove', 'CoordenadorController@remove')->middleware('auth');
Route::resource('coordenador', 'CoordenadorController')->middleware('auth');
Route::resource('disciplinas', 'DisciplinasController')->middleware('auth');
Route::resource('professor', 'ProfessorController')->middleware('auth');
Route::get('professor/anexo/download/{arquivo}', 'ProfessorController@downloadAnexo')->middleware('auth');
Route::resource('planoDeEnsino', 'PlanoDeEnsinoController')->middleware('auth');
Route::resource('cadastroppc', 'CadastroppcController')->middleware('auth');

