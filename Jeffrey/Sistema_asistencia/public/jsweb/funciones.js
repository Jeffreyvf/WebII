
function validarcampos(){

    var lnombre=document.getElementById('ednombre').value;
    var lclave=document.getElementById('edclave').value;
    mensaje='';
    otromensaje='';

    if (lnombre==''){ 
        mensaje='Este valor no puede estar vacio'+' <br> ';
       
    }

    if (lnombre.length<=3){ 
        mensaje=mensaje+'Se necesita al menos 4 caracteres';
       
    }

    if (mensaje==''){

    }else{
        document.getElementById('msUSA').innerHTML=mensaje;
    }


    if (lclave==''){ 
        otromensaje='Campo requerido';
    }else{
       
    }
    if (otromensaje==''){}
    else
    {
        document.getElementById('msCLAVE').innerHTML=otromensaje;

    }

    if (( mensaje=='' )&& (otromensaje=='') ){

        validarLogin(lnombre,lclave);

    }
    

}

function validarLogin(useru,claveu){

    var type = 'POST';
    var formdata={'lusuario':useru,'lclave':claveu};
    var ruta='validarlogin';

    $.ajax({
        type:type,
        url:ruta,
        data:formdata,
        dataType:"JSON",
         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success:function(data){

                console.log(data);

                if (data.mensaje=="exito"){
                    window.location.href=window.location.origin+'/principal';
                }

        },
        error:function(data){

            console.log(data);
            alert('ERROR DE CONEXION, O CREDENCIALES INCORRECTOS');
            
        }
    });

 
}


function resetCampos(ncampo){

    //console.log('entra');

    if (ncampo=='msUSA')
    document.getElementById('msUSA').innerHTML='';

    if (ncampo=='msCLAVE')
    document.getElementById('msCLAVE').innerHTML='';


}

function grabarNuevoUsuario(){
   var type = 'POST';

    ///capturar las variables del formulario por su id:
     useru=document.getElementById('eduser').value;
     claveu=document.getElementById('edclave').value;
     alias=document.getElementById('ednombre').value;

    // controladorLogin  con los campos: usuario,nombre, clave
    var formdata={'luser':useru,'lclave':claveu,'lalias':alias};
    var ruta='nuevousuario';

    $.ajax({
        type:type,
        url:ruta,
        data:formdata,
        dataType:"JSON",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success:function(data){

                console.log(data);

                if (data.mensaje=="exito"){
                   alert('USUARIO AGREGADO CON EXITO');
                   window.location.href=window.location.origin+'/login';

                }

        },
        error:function(data){

            console.log(data);
            alert('ERROR DE CONEXION , O CREDENCIALES INCORRECTOS');
            
        }
    });
}