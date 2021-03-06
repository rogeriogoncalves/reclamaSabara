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
Route::resource('/reclamar', 'ReclamacaoController')->middleware('auth');
Route::post('/cadastrareclamacao',"ReclamacaoController@store")->name('cadastrarReclamacao');
Route::resource('/usuario', 'UserController')->middleware('auth');
Route::get('/thumbsUp/{id}{idUsuario}', 'ReclamacaoController@storeThumbsUp')->name('reclamar.storeThumbsUp');
Route::get('/thumbsDown/{id}{idUsuario}', 'ReclamacaoController@storeThumbsDown')->name('reclamar.storeThumbsDown');
Route::get('/buscaReclamacao', 'ReclamacaoController@search')->name('reclamar.search');
Route::get('/minhasReclamacoes/{usuario}', 'ReclamacaoController@myComplaints')->name('reclamar.myComplaints');
Auth::routes();