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

Route::get('ajax',function() {
    return view('message');
 });
 //Route::post('/getmsg','AjaxController@index');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('produtos', \App\Http\Controllers\ProdutoController::class);
Route::resource('categorias', \App\Http\Controllers\CategoriaController::class);
Route::resource('fornecedores', \App\Http\Controllers\FornecedorController::class);

//Route::get('/teste', 'App\Http\Controllers\Admin\TesteController@index')->name('teste');
Route::get('load_cidades', 'App\Http\Controllers\FornecedorController@loadcidades')->name('load_cidades');


Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
