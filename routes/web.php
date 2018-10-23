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

// The pipe below denotes 'or', in this case meaning '/' or '/feed'
Route::resource('/', 'FeedController')->middleware('auth');
Route::get('/reclamar',"CadastroController@show")->name('reclamarView');
Route::post('/cadastrareclamacao',"CadastroController@store")->name('cadastrarReclamacao');
Auth::routes();