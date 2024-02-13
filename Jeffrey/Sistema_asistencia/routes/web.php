<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerLogin;
use App\Http\Controllers\ControllerPrincipal;

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
