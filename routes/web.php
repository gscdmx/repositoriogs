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


//LOGOUT Y REDIRECT
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/', 'HomeController@Index')->middleware('auth');



Auth::routes();

Route::group(['middleware' => 'auth'], function () {
	
//
Route::get('/home', 'HomeController@index')->name('home');


    //RUTAS USUARIO
Route::get('/nuevoUsuario', 'UserController@nuevo_usuario');
Route::get('/listadosUsuarios', 'UserController@listadoUsuario');
Route::get('/edicionUsuario/{id}', 'UserController@editar_usuario');
Route::post('/guardarEdicionUsuario/{id}', 'UserController@save_edicion__usuario');
Route::post('/guardarUsuario', 'UserController@save_usuario');


//RUTAS REPOSITORIO
Route::get('/repositorios/list', 'RepositorioController@vista_repositorios');/////////////probado
Route::get('/repositorios/misarchivos', 'RepositorioController@mi_repositorio');//////////probado
Route::get('/repositorios/misarchivos2/{id}', 'RepositorioController@mi_repositorio2');
Route::post('/repositorio/guardararchivo', 'RepositorioController@save_archivo');//////////////
Route::get('/repositorios/repositoriousuarios/{id}', 'RepositorioController@repositorio_usuarios');

//RUTAS CARPETAS USUARIO
Route::get('/repositorios/carpetas', 'RepositorioController@vista_carpetas');

Route::get('/repositorios/miscarpetas', 'RepositorioController@mi_carpeta');
Route::post('/repositorio/guardarcarpeta', 'RepositorioController@save_carpeta');





});

