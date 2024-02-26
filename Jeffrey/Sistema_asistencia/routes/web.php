<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerLogin;
use App\Http\Controllers\ControllerPrincipal;
use App\Http\Controllers\ControllerPersona;
use App\Http\Controllers\ControllerUsuario;
use App\Http\Controllers\ControllerMascota;
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

//Route::get('formulario', function () {
   //return view('login');
//});
Route::get('/', function () {
    return view('login');
}); 

Route::get('login',
 function(){
    return view('login');
 }
);
//Route::get('/', function(){
 //return view('welcome ');
//});


Route::get('/',[ControllerLogin::class,'clogin']);

Route::get('registro',[ControllerLogin::class,'cregistro']);

Route::post('validarlogin',[ControllerLogin::class,'validarUsuario']);

Route::get('principal',[ControllerPrincipal::class,'principal']);

Route::post('nuevousuario',[ControllerLogin::class,'agregarUsuario']);
// sin uso
//Route::get('listarusuarios',[ControllerLogin::class,'vlistarusuarios']);
Route::get('lUsuarios',[ControllerUsuario::class,'vLusuarios']);

Route::get('lnuevoUsuario',[ControllerUsuario::class,'vnuevoUsuario']);

Route::get('gravarUsuario',[ControllerUsuario::class,'vgravarUsuario']);

Route::get('DesactivarActivar',[ControllerUsuario::class,'vDesactivarActivar']);

Route::get('filtrarUsa',[ControllerUsuario::class,'vfiltrarUsa']);

Route::get('editarUsuario',[ControllerUsuario::class,'vEditarUsuario']);

Route::get('actualizarUsuario',[ControllerUsuario::class,'vActualizarUsuario']);



//////////////// examen //////////////////////////////
Route::get('listarMascota',[ControllerMascota::class,'vlistarMascota']);
Route::get('lnuevomascota',[ControllerMascota::class,'vNuevaMascota']);
Route::get('lgravarmascota',[ControllerMascota::class,'vGravarMascota']);
Route::get('lmascotaDesactivar',[ControllerMascota::class,'vMascotadesactivar']);
Route::get('lfiltrarMascota',[ControllerMascota::class,'vfiltrarMascota']);


// Vista reporte
Route::get('verPDF',[ControllerUsuario::class,'ReportesPDF']);