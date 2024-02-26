<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use View;
use DB;
use Session;
use PDF;

class ControllerLogin extends BaseController
{

     public  function clogin(){
        $nombre='miNombre';

        //Borrar sesion al refrecar pagina:
        Session::forget('usuariologin');


        // mueestra la vista logint
        return View::make('logint')->with('nombre',$nombre);
     }

     public  function cregistro(){

         // mueestra la vista registrate
        return View::make('registrate');
     }


     public  function validarUsuario(Request $request){

        $nombreu=$request->lusuario;
        $claveu=$request->lclave;

        //$nombreu='adm';
       // $claveu='123';

        $conexiondb='dbWeb2';

        $listau=DB::connection($conexiondb)->select('select nombre_u,user_u,cod_u from usuario where user_u=?  and clave_u=?',[$nombreu,$claveu]); 
        
        if (count($listau)>0){
             
           // dd('CREDENCIALES CORRECTAS');
           $tk= str::random(50);
           $aUsuario=array(['token'=>$tk,'nombreu' =>$listau[0]->nombre_u]);

           $codusa=$listau[0]->cod_u;

           $modficaru =DB::connection($conexiondb)->update(' update usuario set token_u=? where cod_u=? ',[$tk,$codusa]);

           $resultado=array('mensaje'=>'exito');

           Session::put(['usuariologin'=>$aUsuario]);


        }else{
           // dd('CREDENCIALES INCORRECTA');
           $resultado=array('mensaje'=>'error');
        }

        return response()->json($resultado);

     }


     ///// agrega usuario /////////////

     public function agregarUsuario(Request $request){
         // campos: usuario,nombre,clave,estado
         $useru=$request->luser;
         $claveu=$request->lclave;
         $alias=$request->lalias;
         $estado='activo';

               //para agregar usuario
               $conexiondb='dbWeb2';
               $nuevouser =DB::connection($conexiondb)->insert(' insert into usuario (nombre_u,user_u,clave_u,estado_u) value(?,?,?,?) ',[$alias,$useru,$claveu,$estado]);

                //// mensaje de exito
                $resultado=array('mensaje'=>'exito');

               //return View::make('mensaje js');
                return response()->json($resultado); 

    }



    ///////// sin uso todavia
     public function vlistarusuarios(){
              //Proteger ruta  al iniciar login    
           if (Session()->has("usuariologin")) {
              //conexion con BD 
              $conexiondb='dbWeb2';
              // seleciona todos los campos que mostrara de la tabla "usuario"
              $listau=DB::connection($conexiondb)->select('select cod_u, nombre_u,user_u,estado_u from usuario' );

              // capturar los datos enviado de la consulta
              return View::make('listausuario',['listausa'=>$listau]);

           }else{
               
               return View::make('login');
           }
               
    }
}
