<?php

use Illuminate\Support\Facades\Auth;
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

Route::resource('/', 'HomeController');
Route::resource('/home', 'HomeController');
Route::get('/perfil', 'HomeController@profile');

Auth::routes();
$router->group(['middleware' => 'auth'], function () {
    Route::get('/logout', 'HomeController@logout');
});

/* Coleção */
// TODO - ADICIONAR COLEÇÃO

/* Livros */
Route::resource('livros', 'LivrosController');

/* Categorias */
Route::resource('categorias', 'CategoriasController');

/* Coleções */
Route::resource('colecoes', 'ColecoesController');

/* Coleção livro */
Route::get('colecao_livro/create/{colecao_id}', 'ColecaoLivroController@create');
Route::resource('colecao_livro', 'ColecaoLivroController');
