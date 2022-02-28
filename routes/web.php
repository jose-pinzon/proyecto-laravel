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

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// --------------------------------------------parte perfil---------------------------------------------------------------------
// editar perfil de usuario
Route::get('editar/usuario','UsuarioController@edit')->name('edit');
// guardar los cambios
Route::put('actualizar','UsuarioController@update')->name('actualizar');
// sacar la imagen del avatar
Route::get('avatar/user/{filename}','UsuarioController@getAvatar')->name('avatar.user');



// -----------------------------------------------Habitaciones--------------------------------------------------------------------------------
Route::apiResource('apiHabitaciones','habitacionesController');
Route::get('habitaciones', 'habitacionesController@principal')->name('habitacion.tabla');



// -----------------------------------------------tipo Habitaciones--------------------------------------------------------------------------------
Route::apiResource('tipoHabitaciones','tipoHabitacionController');
Route::get('tiposhabitaciones', 'tipoHabitacionController@vista')->name('habitacion.tipo');



// -----------------------------------------------Grupos clientes--------------------------------------------------------------------------------
Route::apiResource('gruposApi','GrupoController');
Route::get('grupos','GrupoController@vista')->name('vista.grupo');

Route::get('clientes/{id_grupo}',[
	'as' => 'clientes',
	'uses' => 'ReservasController@GetClientes',
]);

// -----------------------------------------------Clientes--------------------------------------------------------------------------------

Route::apiResource('ClientesApi','ClienteController');
Route::get('clientes','ClienteController@vista')->name('vista.clientes');

// Route::apiResource('PruebasApi','prubasController');

// -----------------------------------------------Reservas--------------------------------------------------------------------------------
Route::get('vista/cuartos/reservados','ReservasController@index')->name('cuartos.reservas');
Route::get('detalle/cuarto/{id}','ReservasController@detalles')->name('habitacion.detalle');
Route::get('detalle/Checkout/{id}','ReservasController@detallesChecout')->name('habitacion.checkout');
Route::post('/guardar','ReservasController@store')->name('habitacion.guardar');
Route::get('/buscar/Habitacion/{search?}','ReservasController@buscarHabitacion')->name('listado.habitaciones');
Route::apiResource('ReservasApi','OcupadoController');
Route::patch('/actualizar/{id}','ReservasController@actualizar');

// -------------------------------------------------Comentarios------------------------------------------------------------------------------------
// Route::apiResource('comentariosApi','ComentariosController');//cuando ya se inicio sesionsss
Route::apiResource('comentarioApi','PublicoController');//para que los vicitates puedan poner su comentario
Route::get('clientes2','PublicoController@clientes');


// ---------------------------------------------vista para el usuario------------------------------------------------------------------------------

Route::get('comentarios/vista','ComentariosController@getComentarios')->name('vista.comment');
Route::get('comentario/delete/{id}','ComentariosController@destroy')->name('delete.comment');


Route::get('/reservaciones/datos','ReservasController@datosRersevas');

Route::view('prueba', 'prueba');
