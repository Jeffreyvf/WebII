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

class ControllerUsuario extends BaseController
{
	public function vLusuarios(Request $request){
		if (Session()->has("usuariologin")) {
			
			$conexiondb='dbWeb2';

        	$listarUsa=DB::connection($conexiondb)->select('select cod_u,nombre_u,user_u,estado_u,cargo_u from usuario '); 

        	$view = view::make('listaUSA')->with('listausa',$listarUsa);
        	$sections = $view->renderSections();

        	return Response::json($sections['Cargadato']);
		}
		else {
			$data=array (['mensaje'=>'sinusuario']);
			return response()->json($data);
		}
	}

	public function vnuevoUsuario(Request $request){

		$opcion=$request->accion;

		if (Session()->has("usuariologin")) {
			
			$conexiondb='dbWeb2'; 

        	$view = view::make('nuevoUsuario');
        	
        	$sections = $view->renderSections();

        	return Response::json($sections['Cargadato']);
		}
		else {
			$data=array (['mensaje'=>'sinusuario']);
			return response()->json($data);
		}
	}

	public function vgravarUsuario(Request $request){
         // campos: usuario,nombre,clave,estado
         $usuarioU=$request->usuarioU;
         $contraU=$request->contraU;
         $nombreU=$request->nombreU;
         $estado=$request->estadop;
         $cargo_U=$request->cargoU;

         	if (Session()->has("usuariologin")) {
			
	        	//conexion base datos
               $conexiondb='dbWeb2';

               $nuevousuario =DB::connection($conexiondb)->insert(' insert into usuario (nombre_u,user_u,clave_u,estado_u,cargo_u) value(?,?,?,?,?) ',[$nombreU,$usuarioU,$contraU,$estado,$cargo_U]);

                //// mensaje de exito
                $data=array('mensaje'=>'exito');
                return response()->json($data);

			}

			else {

				$data=array (['mensaje'=>'sinusuario']);
				return response()->json($data);

			}
           
    }
	public function vDesactivarActivar(Request $request){
		
		// reciviendo los datos del js 
		// en una nueva variable
		$codper=$request->codper;
        $estado=$request->estadop;

        // proteger la ruta 
        if (Session()->has("usuariologin")) {
			
	        	//conexion base datos
               $conexiondb='dbWeb2';

               $nuevousuario =DB::connection($conexiondb)->update(' update usuario set estado_u =? where cod_u=?  ',[$codper,$estado]);

                //// mensaje de exito
                $data=array(['mensaje'=>'exito']);
                return response()->json($data);

			}

			else {

				$data=array (['mensaje'=>'sinusuario']);
				return response()->json($data);

			}

	}

	public function vEditarUsuario(Request $request){
			$opcion=$request->accion;
			$cod_u=$request->cod_u;

			if (Session()->has("usuariologin")) {
				
				$conexiondb='dbWeb2';

				$listaU=DB::connection($conexiondb)->select('select * from usuario where cod_u=?',[$cod_u]); 

				$view = view::make('editarUsuriO')->with('listausa',$listaU)->with('cod_u',$cod_u);

				$sections = $view->renderSections();

				return Response::json($sections['Cargadato']);
			}
			else {
				$data=array (['mensaje'=>'sinusuario']);
				return response()->json($data);
			}
	}


	public function vfiltrarUsa(Request $request){

			$estado=$request->estado;
			$cargo=$request->cargo;
			$buscar=$request->buscar;
			$filtroEstado='';
			$filtroCargo='';
			$filtroBuscar='';
				
			if (Session()->has("usuariologin")) {
				
				$conexiondb='dbWeb2';

				//condicion si todos estan activos = vacio;
				if ($estado=='todos') {
					
				}else {
				//sino aplica el mostrar listros	
					$filtroEstado=' and estado_u = "'.$estado.'" ';
				}


				/// filtro "cargo"
				if ($cargo=='todos') {
					
				}else {
				//sino aplica el mostrar listros	
					$filtroCargo=' and cargo_u = "'.$cargo.'" ';
				}


				// condición para el boton buscar si la cadena es meno a 2
				if (strlen($buscar)<2){
					
				}else{
					//sino aplica la busqueda por coincidencia "like" + el comodin "%"
					$filtroBuscar=' and nombre_u like "%'.$buscar.'%" ';
					//%ma "%ma%" ma% busquedax comodines "%"
				}
				

	        	$listarUsa=DB::connection($conexiondb)->select('select cod_u,nombre_u,user_u,estado_u,cargo_u from usuario  where cod_u>0 '
	        		.$filtroEstado.$filtroCargo.$filtroBuscar); 

	        	$view = view::make('nuevaVistarender')->with('listausa',$listarUsa);
	        	$sections = $view->renderSections();

	        	return Response::json($sections['Cargadato']);
			}
			else {
				$data=array (['mensaje'=>'sinusuario']);
				return response()->json($data);
			}
	}
		
	public function vActualizarUsuario(Request $request){

		$usuarioU=$request->usuarioU;
        $contraU=$request->contraU;
        $nombreU=$request->nombreU;
        $cargo_U=$request->cargoU;
        $estado=$request->estadop;
		$cod_per=$request->cod_u;

		if (Session()->has("usuariologin"))
	   	{

		   $conexiondb='dbWeb2';

		   $actualizarUs =DB::connection($conexiondb)->update(' update usuario set 
		   nombre_u=?,user_u=?,clave_u=?,estado_u=?,cargo_u=? where cod_u=? ',
		   [$nombreU,$usuarioU,$contraU,$estado,$cargo_U,$cod_per]);

		   $data=array (['mensaje'=>'exito']);
		   return response()->json($data);

	   	} //sin sesion
	   	else {
		   $data=array (['mensaje'=>'sinusuario']);
		   return response()->json($data);
	   	}
   
	}


	// REPORTES
	public function ReportesPDF(){
		$titulo="Registro usuario";
		
		$conexiondb='dbWeb2';
		$listarUsa=DB::connection($conexiondb)->select('select * from usuario '); 
		$pdf=PDF::loadView('ReportesPDF.Reportes',['titulo'=>$titulo,'listausa'=>$listarUsa])->setpaper('Letter','portrait');

		
		$pdf->getDOMpdf()->set_option('isPhpEnabled',true);
		// para descargar pdf
		return $pdf->download('ReportesUsuario.pdf');

	}


}