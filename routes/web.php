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

Route::get('/', 'App\Http\Controllers\MusicasController@home')
    ->name('musicas.index');

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


Route::get('/musicos/create','App\Http\Controllers\MusicosController@create')
    ->name('musicos.create')->middleware('auth');
Route::post('/musicos/store','App\Http\Controllers\MusicosController@store')
    ->name('musicos.store')->middleware('auth');
Route::get('/musicos/{id}/edit','App\Http\Controllers\MusicosController@edit')
    ->name('musicos.edit')->middleware('auth');
Route::patch('/musicos/{id}','App\Http\Controllers\MusicosController@update')
    ->name('musicos.update')->middleware('auth');


Route::get('/musicos/{id}/delete','App\Http\Controllers\MusicosController@delete')
    ->name('musicos.delete')->middleware('auth');
Route::delete('/musicos','App\Http\Controllers\MusicosController@destroy')
    ->name('musicos.destroy')->middleware('auth');


    Route::get('/musicas/like/{id}','App\Http\Controllers\MusicasController@likes')
    ->name('musicas.like');



Route::get('/generos/create','App\Http\Controllers\GenerosController@create')
    ->name('generos.create')->middleware('auth');
Route::post('/generos/store','App\Http\Controllers\GenerosController@store')
    ->name('generos.store')->middleware('auth');
Route::get('/generos/{id}/edit','App\Http\Controllers\GenerosController@edit')
    ->name('generos.edit')->middleware('auth');
Route::patch('/generos/{id}','App\Http\Controllers\GenerosController@update')
    ->name('generos.update')->middleware('auth');


Route::get('/generos/{id}/delete','App\Http\Controllers\GenerosController@delete')
    ->name('generos.delete')->middleware('auth');
Route::delete('/generos','App\Http\Controllers\GenerosController@destroy')
    ->name('generos.destroy')->middleware('auth');




Route::get('/albuns/create','App\Http\Controllers\AlbunsController@create')
    ->name('albuns.create')->middleware('auth');
Route::post('/albuns/store','App\Http\Controllers\AlbunsController@store')
    ->name('albuns.store')->middleware('auth');
Route::get('/albuns/{id}/edit','App\Http\Controllers\AlbunsController@edit')
    ->name('albuns.edit')->middleware('auth');
Route::patch('/albuns/{id}','App\Http\Controllers\AlbunsController@update')
    ->name('albuns.update')->middleware('auth');


Route::get('/albuns/{id}/delete','App\Http\Controllers\AlbunsController@delete')
    ->name('albuns.delete')->middleware('auth');
Route::delete('/albuns','App\Http\Controllers\AlbunsController@destroy')
    ->name('albuns.destroy')->middleware('auth');





