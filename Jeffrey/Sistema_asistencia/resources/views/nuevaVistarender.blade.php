@section('Cargadato')
<div class="card-body table-responsive p-0">
     <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre Usuario</th>
                    <th>Usuario</th>
                    <th>Cargo</th>
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
                                  <td>{{$listau->cargo_u}}</td>
                                  <td>
                                    <span class="tag tag-success">{{$listau->estado_u}}
                                    </span><br>  

                                    @if ($listau->estado_u =="activo")

                                      <span class="badge bg-danger" role="button" onclick="desactivarActivar('desactivado',{{$listau->cod_u}})">Desactivar</span>

                                    @else
                                       <span class="badge bg-success" role="button" onclick="desactivarActivar('activo',{{$listau->cod_u}})">Activar</span>
                                    @endif  
                                  </td>

                                  <td>
                          
                                      <button type="button" class="btn btn-info" onclick="editausuario('editar',{{$listau->cod_u}})" ><i class="fas fa-edit"></i>Editar</button>
                                  </td>                           
                              </tr>

                              @endforeach


                              <!--------- / Codigo php -------------------->
                         
                        </tbody>
    </table>
</div>
@endsection('Cargadato')