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
Route::get('/', 'Auth\LoginController@showLoginForm');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {

});

//RUTAS MENUS
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/usuario', 'Admin\usuarioController@index')->name('usuario');
Route::get('/orden-produccion', 'User\orden_produccionController@index')->name('orden-produccion');
Route::get('/configuracion', 'User\configuracionController@index')->name('configuracion');
//Route::get('/turno', 'User\configuracionController@turno')->name('turno');


//RUTAS USUARIO
Route::get('user/nuevo', 'Admin\UsuarioController@crear')->name('user/nuevo');
Route::post('usuario/guardar', 'Admin\UsuarioController@guardar')->name('usuario/guardar');
Route::get('failed-user', 'Admin\UsuarioController@guardarUserFailed')->name('failed-user');
Route::get('success-user', 'Admin\UsuarioController@guardarUserSuccess')->name('success-user');
Route::get('user/edit/{id}', 'Admin\UsuarioController@editarUser')->name('user/edit/{id}');
Route::post('usuario/actualizar', 'Admin\UsuarioController@actualizarUser')->name('usuario/actualizar');
Route::get('user/detalle/{id}', 'Admin\UsuarioController@detalleUser')->name('user/detalle/{id}');
Route::get('user/eliminar/{id}', 'Admin\UsuarioController@eliminarUser')->name('user/eliminar/{id}');
Route::get('user/activar/{id}', 'Admin\UsuarioController@activarUser')->name('user/activar/{id}');


//RUTAS ROLES
Route::get('/rol', 'Admin\RolController@index')->name('rol');
Route::get('rol/crear', 'Admin\RolController@crear')->name('crear_rol');
Route::post('guardar_rol', 'Admin\RolController@guardar')->name('guardar_rol');
Route::get('menu', 'Admin\MenuRolController@index')->name('menu');
Route::get('menu/crear', 'Admin\Menu_controller@index')->name('menu/crear');
Route::get('menu-rol', 'Admin\MenuRolController@index')->name('menu-rol');
Route::post('menu-rol', 'Admin\MenuRolController@guardar')->name('guardar_menu_rol');
Route::post('menu/guardar', 'Admin\menu_controller@guardar')->name('menu/guardar');
Route::post('menu/guardar-orden', 'Admin\menu_controller@guardarOrden')->name('guardar-orden');
Route::get('rol/edit/{id}','Admin\RolController@editar')->name('rol/edit/{id}');
Route::post('rol/actualizar', 'Admin\RolController@actualizar')->name('rol/actualizar');

//Route::resource('turnos','User\TurnoController');

Route::get('pedido', 'HomeController@getData')->name('pedido');
Route::get('articulos_umk', 'HomeController@getArtiUMK')->name('articulos_umk');
Route::get('articulos_gp', 'HomeController@getArtiGP')->name('articulos_gp');
Route::get('laboratorios', 'HomeController@getLab')->name('laboratorios');
Route::get('consignado', 'HomeController@getConsig')->name('consignado');

Route::post('guardar_pedido', 'HomeController@guardar')->name('guardar_pedido');
Route::post('editar_pedido', 'HomeController@editar')->name('editar_pedido');
Route::post('cambiar_estado', 'HomeController@cambiarEstado')->name('cambiar_estado');

//Route::get('mail', 'MailerController@index')->name('mail');

Auth::routes();
