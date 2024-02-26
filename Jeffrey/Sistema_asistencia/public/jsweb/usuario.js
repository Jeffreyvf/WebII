function nuevoUsuario(accion)
{
    var type = "GET";
    var formData = {'accion':accion};

    var ruta='lnuevoUsuario';
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

function listadeUsurio(opcion)
{
	var type = "GET";
	var formData = {'opcion':opcion};

	var ruta='lUsuarios';
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

function RegistrarNuevoUsuario(){
   var type = 'GET';

    ///capturar las variables del formulario por su id:
     usuarioU=document.getElementById('Nusuario').value;
     contraU=document.getElementById('Nclave').value;
     nombreU=document.getElementById('Nnombre').value;
     cargoU=document.getElementById('Ncargo').value;
     
     estado="activo";


    // controladorLogin  con los campos: usuario,nombre, clave
    var formdata={'usuarioU':usuarioU,'contraU':contraU,'nombreU':nombreU,'estadop':estado,'cargoU':cargoU};
    var ruta='gravarUsuario';


    $.ajax({
        type:type,
        url:ruta,
        data:formdata,
        dataType:"JSON",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success:function(data){

                if (data.mensaje=="exito"){
                   //alert('USUARIO AGREGADO CON EXITO');
                   listadeUsurio('principal');

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

function desactivarActivar(codper,estado){

   
   var type = 'GET';


    // controladorLogin  con los campos: usuario,nombre, clave
    var formdata={'codper':codper,'estadop':estado};
    var ruta='DesactivarActivar';
    

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
                   listadeUsurio('principal');
                   
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

function filtrarusuario()
{
    var type = "GET";


    festado=document.getElementById('edestado').value;
    fcargo=document.getElementById('edcargo').value;
    fbusca=document.getElementById('edbusca').value;

    var formData = {'estado':festado,'cargo':fcargo,'buscar':fbusca};

    var ruta='filtrarUsa';
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
function editausuario(accion,cod_u){
    var type = 'GET';

    var formData = {'accion':accion,'cod_u':cod_u };

    var ruta='editarUsuario';
    $('#loadingESPERE').show();


    $.ajax({
        type:type,
        url:ruta,
        data:formData,
        dataType:"JSON",
        success: function(data){
            var ldata = data[0];
            if (ldata.mensaje=='sinusuario')
            {  
                window.location.href=window.location.origin+'/login';
            }
            else 
            {
                
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
function actualizaUser(cod_u){

    var type = 'GET';
    var usuarioU=document.getElementById('Nusuario').value;
    var contraU=document.getElementById('Nclave').value;
    var nombreU=document.getElementById('Nnombre').value;
    var cargoU=document.getElementById('Ncargo').value;

    var estado="activo";

     
     var formdata={'usuarioU':usuarioU,'contraU':contraU,'nombreU':nombreU,'cargoU':cargoU,'estadop':estado,'cod_u':cod_u};

     var ruta='actualizarUsuario';
 
     $.ajax({
         type:type,
         url:ruta,
         data:formdata,
         dataType:"JSON",
         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
         success:function(resultado){
                    data=resultado[0];
                 if (data.mensaje=="exito"){
                    //alert('USUARIO AGREGADO CON EXITO');
                    listadeUsurio('principal');

                 }
                 if (data.mensaje=="sinusuario"){
                      window.location.href=window.location.origin+'/login';
                } 
 
         },
         error:function(data){
 
             console.log(data);
             alert('ERROR DE CONEXION , O CREDENCIALES INCORRECTOS');
             
         }
     });
 }

// para buscar utilizando el teclado "Enter"
function handleKeyPress(event)
{
       if (event.key=== 'Enter') {
           filtrarusuario();
           document.getElementById('edbusca').value='';
       }

}
