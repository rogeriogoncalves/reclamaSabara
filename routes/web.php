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

Route::get('/{feed}', function ()
{
    return view('feed');
})->where('feed', '(|feed)')->middleware('auth');; // the pipe denotes 'or', in this case meaning '/' or '/feed'

Route::resource('/', 'CadastroController');
Route::get('/listarcadastro',"CadastroController@listarcadastro")->name('listarcadastro');
Route::get('/cadastrareclamacao',"CadastroController@cadastrareclamacao")->name('cadastrareclamacao');

Auth::routes();

Route::get('/home', 'CadastroController@index')->name('home');