<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

<style type="text/css">
	.borde{
		border:1px solid #000;
		background-color:red;
	}


</style>

</head>

<body>

	<h1>{{$titulo}}</h1>
			
    	<div class="card-body table-responsive p-0">
                <table>
                  <thead>
                    <tr  class="borde">
                      <th>#</th>
                      <th class="borde">brayan</th>
                      <th>Usuario</th>
                      <th>Estado</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>

                        <!--Codigo php para mostrar los datos de la BD--->
                        @php

                          $contador =0;
                        
                        @endphp

                        @foreach ($listausa as $listau)
                        @php
                          $contador++
                        @endphp
                        <tr>
                          <td>{{$contador}}</td>
                          <td>{{$listau->nombre_u}}</td>
                          <td>{{$listau->user_u}}</td>
                          <td>
                            <span class="tag tag-success">{{$listau->estado_u}}
                            </span><br>  

                            @if ($listau->estado_u =="activo")

                              <span class="badge btn-danger" onclick="desactivarActivar('desactivado',{{$listau->cod_u}})">Desactivar</span>

                            @else
                               <span class="badge btn-success" onclick="desactivarActivar('activar',{{$listau->cod_u}})">Activar</span>
                            @endif  

                          </td>

                          <td>
                             <!-- <button type="button" class="btn btn-danger">Desactivar</button> -->

                              <button type="button" class="btn btn-info"><i class="fas fa-edit"></i>Editar</button>
                          </td>

                         
                          
                        </tr>

                        @endforeach


                        <!--------- / Codigo php -------------------->
                   
                  </tbody>
                </table>
         </div>
		
</body>
</html>