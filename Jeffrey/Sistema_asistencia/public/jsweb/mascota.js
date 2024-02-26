function listaMascotas(opcion)
{
	var type = "GET";
	var formData = {'opcion':opcion};

	var ruta='listarMascota';
	$('#loadingESPERE').show();


    $.ajax({
        type:type,
        url:ruta,
        data:formData,
        dataType:"JSON",
        success:function(data){
        	var ldata = data[0];
              
                if (ldata.mensaje=='sinusuario'){
                  
                   window.location.href=window.location.origin+'/login';

                }
                else {
                	if (opcion=='principal')
                     {
                		$('#pprincipal').empty().append($(data));
                		$('#loadingESPERE').hide();
                	}
                    else {
                        $('#paneldetalle').empty().append($(data));
                    }
                }

        },

        error:function(data)
        {
        	console.log(data);
        }
    });    

}
function nuevoMascota(accion)
{
    var type = "GET";
    var formData = {'accion':accion};

    var ruta='lnuevomascota';
    $('#loadingESPERE').show();


    $.ajax({
        type:type,
        url:ruta,
        data:formData,
        dataType:"JSON",
        success:function(data){
            var ldata = data[0];
              
                if (ldata.mensaje=='sinusuario'){
                  
                   window.location.href=window.location.origin+'/login';

                }
                else {
            
                        $('#pprincipal').empty().append($(data));
                        $('#loadingESPERE').hide();
                }

        },

        error:function(data)
        {
            console.log(data);
        }
    });    

}
function RegistrarNuevamascota(){
   var type = 'GET';

    ///capturar las variables del formulario por su id:
     Nmascota=document.getElementById('idmascota').value;
     Nraza=document.getElementById('idraza').value;
     Ntipo=document.getElementById('idtipo').value;
     Ndueño=document.getElementById('iddueño').value;
     Ndetalle=document.getElementById('iddetalle').value;

     estado="activo";


    // controladorMascota enviado;
    var formdata={'Nmascota':Nmascota,'Nraza':Nraza,'Ntipo':Ntipo,'Ndueño':Ndueño,'estadop':estado,'Ndetalle':Ndetalle};
    var ruta='lgravarmascota';


    $.ajax({
        type:type,
        url:ruta,
        data:formdata,
        dataType:"JSON",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success:function(data){

                if (data.mensaje=="exito"){
                   //alert('USUARIO AGREGADO CON EXITO');
                   listaMascotas('principal');

                }
                if (data.mensaje=="sinusuario") {

                     window.location.href=window.location.origin+'/login';
                }

        },
        error:function(data){

            console.log(data);
            alert('ERROR DE CONEXION , O CREDENCIALES INCORRECTOS');
            
        }
    });
}
function DesactivarMascota(codper,estado){

   
   var type = 'GET';


    // controladorLogin  con los campos: usuario,nombre, clave
    var formdata={'codper':codper,'estadop':estado};
    var ruta='lmascotaDesactivar';
    

    $.ajax({
        type:type,
        url:ruta,
        data:formdata,
        dataType:"JSON",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success:function(resultado){
                data = resultado[0];
                //alert("hola");
                if (data.mensaje=="exito"){


                   //alert('USUARIO AGREGADO CON EXITO');
                   listaMascotas('principal');
                   
                }
                if (data.mensaje=="sinusuario") {


                     window.location.href=window.location.origin+'/login';
                }


        },
        error:function(data){

            console.log(data);
            alert('ERROR DE CONEXION , O CREDENCIALES INCORRECTOS');
            
        }
    });
}
function filtrarMascota()
{

    fbuscar=document.getElementById('eddueño').value;

    if (fbuscar != '') {

        festado=document.getElementById('edestado').value='todos';
        ftipo=document.getElementById('edtipo').value='todos';
        fraza=document.getElementById('edraza').value='todos';
        fbuscar=document.getElementById('eddueño').value;
    }else {

        festado=document.getElementById('edestado').value;
        ftipo=document.getElementById('edtipo').value;
        fraza=document.getElementById('edraza').value;
    }

    var type = "GET";

    var formData = {'estado':festado,'tipo':ftipo,'raza':fraza,'buscar':fbuscar};

    var ruta='lfiltrarMascota';
    $('#loadingDetalle').show();


    $.ajax({
        type:type,
        url:ruta,
        data:formData,
        dataType:"JSON",
        success:function(data){
            var ldata = data[0];
              
                if (ldata.mensaje=='sinusuario'){
                  
                   window.location.href=window.location.origin+'/login';

                }
                else {
                   
                        $('#paneldetalle').empty().append($(data));
                        $('#loadingDetalle').hide();
                }

        },

        error:function(data)
        {
            console.log(data);
        }
    });

}
// buscar por teclado enter    
function handleKeyPress(event)
{
       if (event.key=== 'Enter') {
           filtrarMascota();
           document.getElementById('eddueño').value='';
       }

}
