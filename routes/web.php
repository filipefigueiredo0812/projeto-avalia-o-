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

Route::get('/albuns', 'App\Http\Controllers\AlbunsController@index')
    ->name('albuns.index');


Route::get('/generos', 'App\Http\Controllers\GenerosController@index')
    ->name('generos.index');


Route::get('/musicas', 'App\Http\Controllers\MusicasController@index')
    ->name('musicas.index');


Route::get('/musicos', 'App\Http\Controllers\MusicosController@index')
    ->name('musicos.index');

        





Route::get('/albuns/{id}/show', 'App\Http\Controllers\AlbunsController@show')
    ->name('albuns.show');


Route::get('/generos/{id}/show', 'App\Http\Controllers\GenerosController@show')
    ->name('generos.show');

Route::get('/musicas/{id}/show', 'App\Http\Controllers\MusicasController@show')
    ->name('musicas.show');

Route::get('/musicos/{id}/show', 'App\Http\Controllers\MusicosController@show')
    ->name('musicos.show');






Route::post('/albuns/pesquisa', 'App\Http\Controllers\AlbunsController@pesquisar')
    ->name('albuns.form');

Route::post('/generos/pesquisa', 'App\Http\Controllers\GenerosController@pesquisar')
    ->name('generos.form');

Route::post('/musicas/pesquisa', 'App\Http\Controllers\MusicasController@pesquisar')
    ->name('musicas.form');

Route::post('/musicos/pesquisa', 'App\Http\Controllers\MusicosController@pesquisar')
    ->name('musicos.form');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/users','App\Http\Controllers\UsersController@index')
    ->name('users.index');


Route::get('/musicas/create','App\Http\Controllers\MusicasController@create')
    ->name('musicas.create')->middleware('auth');
Route::post('/musicas/store','App\Http\Controllers\MusicasController@store')
    ->name('musicas.store')->middleware('auth');
Route::get('/musicas/{id}/edit','App\Http\Controllers\MusicasController@edit')
    ->name('musicas.edit')->middleware('auth');
Route::patch('/musicas/{id}','App\Http\Controllers\MusicasController@update')
    ->name('musicas.update')->middleware('auth');


Route::get('/musicas/{id}/delete','App\Http\Controllers\MusicasController@delete')
    ->name('musicas.delete')->middleware('auth');
Route::delete('/musicas','App\Http\Controllers\MusicasController@destroy')
    ->name('musicas.destroy')->middleware('auth');