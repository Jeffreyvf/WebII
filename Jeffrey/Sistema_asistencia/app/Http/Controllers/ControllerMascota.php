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
use Response;
use PDF;

class ControllerMascota extends BaseController
{
	public function vlistarMascota(Request $request){
		if (Session()->has("usuariologin")) {
			
			$conexiondb='dbWeb2';

			//listar mascota
        	$listama=DB::connection($conexiondb)->select('select  cod_mt,nombre_mt,tipo_mt,raza_mt,estado_mt,nombre_pe from mascota inner join persona on mascota.fcod_pe=persona.cod_pe ');

        	//listar raza
        	$raza=DB::connection($conexiondb)->select('select nombre_rz from raza where estado_rz="activo" ');  

        	$view = view::make('examen.listaMascota')->with('lmascota',$listama)->with('lraza',$raza);


        	$sections = $view->renderSections();

        	return Response::json($sections['Cargadato']);
		}
		else {
			$data=array (['mensaje'=>'sinusuario']);
			return response()->json($data);
		}
	}

	public function vNuevaMascota(Request $request){

		$opcion=$request->accion;

		if (Session()->has("usuariologin")) {
			
			$conexiondb='dbWeb2'; 
			$raza=DB::connection($conexiondb)->select('select nombre_rz from raza where estado_rz="activo" ');
			$persona=DB::connection($conexiondb)->select('select nombre_pe,cod_pe  from persona where estado_pe="activo" '); 
 

        	$view = view::make('examen.Nuevomascota')->with('lraza',$raza)->with('lpersona',$persona);
        	
        	$sections = $view->renderSections();

        	return Response::json($sections['Cargadato']);
		}
		else {
			$data=array (['mensaje'=>'sinusuario']);
			return response()->json($data);
		}
	}

	public function vGravarMascota(Request $request){
       
	     $Nmascota=$request->Nmascota;
	     $Nraza=$request->Nraza;
	     $Ntipo=$request->Ntipo;
	 	 $Ndueño=$request->Ndueño;
	 	 $Ndetalle=$request->Ndetalle;
	     $estado=$request->estadop;
	     

         	if (Session()->has("usuariologin")) {
			
	        	//conexion base datos
               $conexiondb='dbWeb2';

               $nuevousuario =DB::connection($conexiondb)->insert(' insert into mascota (nombre_mt,raza_mt,tipo_mt,fcod_pe,estado_mt,detalle_mt) value(?,?,?,?,?,?) ',[$Nmascota,$Nraza,$Ntipo,$Ndueño,$estado,$Ndetalle]);

                //// mensaje de exito
                $data=array('mensaje'=>'exito');
                return response()->json($data);

			}

			else {

				$data=array (['mensaje'=>'sinusuario']);
				return response()->json($data);

			}
           
    }
    public function vMascotadesactivar(Request $request){
		
		// reciviendo los datos del js 
		// en una nueva variable
		$codper=$request->codper;
        $estado=$request->estadop;

        // proteger la ruta 
        if (Session()->has("usuariologin")) {
			
	        	//conexion base datos
               $conexiondb='dbWeb2';

               $nuevousuario =DB::connection($conexiondb)->update(' update mascota set estado_mt =? where cod_mt=?  ',[$codper,$estado]);

                //// mensaje de exito
                $data=array(['mensaje'=>'exito']);
                return response()->json($data);

			}

			else {

				$data=array (['mensaje'=>'sinusuario']);
				return response()->json($data);

			}

	}

	public function vfiltrarMascota(Request $request){

			$estado=$request->estado;
			$tipo=$request->tipo;
			$raza=$request->raza;
			$buscar=$request->buscar;

			$filtroEstado='';
			$filtroTipo='';
			$filtroRaza='';
			$filtroBuscar='';

			if (Session()->has("usuariologin")) {
				
				$conexiondb='dbWeb2';

				//condicion si todos estan activos = vacio;
				if ($estado=='todos') {
					
				}else {
				//sino aplica el mostrar listros	
					$filtroEstado=' and estado_mt = "'.$estado.'" ';
				}

					// filtrar tipo
				if ($tipo=='todos') {
					
				}else {
				//sino aplica el mostrar listros	
					$filtroTipo=' and tipo_mt = "'.$tipo.'" ';
				}

					// filtrar raza
				if ($raza=='todos') {
					
				}else {
				//sino aplica el mostrar listros	
					$filtroRaza=' and raza_mt = "'.$raza.'" ';
				}

					//filtrar buscar

				// condición para el boton buscar si la cadena es meno a 2
				if (strlen($buscar)<2){
					
				}else{
					//sino aplica la busqueda por coincidencia "like" + el comodin "%"
					$filtroBuscar=' and nombre_pe like "%'.$buscar.'%" ';
					//%ma "%ma%" ma% busquedax comodines "%"
				}
				

	        	$listarMas=DB::connection($conexiondb)->select('select  cod_mt,nombre_mt,tipo_mt,raza_mt,estado_mt,nombre_pe from mascota inner join persona on mascota.fcod_pe=persona.cod_pe 

					where cod_mt>0

	        	 '.$filtroEstado.$filtroTipo.$filtroRaza.$filtroBuscar);

	        	// codigo de la magia
	        	


	        	$view = view::make('examen.VistaRender')->with('lmascota',$listarMas);
	        	$sections = $view->renderSections();

	        	return Response::json($sections['Cargadato']);
			}
			else {
				$data=array (['mensaje'=>'sinusuario']);
				return response()->json($data);
			}
		}
}	