@section('Cargadato')
 <div class="card-body table-responsive p-0">
                      <table class="table table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Raza</th>
                            <th>Tipo de mascota</th>
                             <th>Propietario</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>

                              <!--Codigo php para mostrar los datos de la BD--->
                              @php

                                $contador =0;
                              
                              @endphp

                              @foreach ($lmascota as $listau)
                              @php
                                $contador++
                              @endphp
                              <tr>
                                  <td>{{$contador}}</td>
                                  <td>{{$listau->nombre_mt}}</td>
                                  <td>{{$listau->raza_mt}}</td>
                                  <td>{{$listau->tipo_mt}}</td>
                                  <td>{{$listau->nombre_pe}}</td>
                                  <td>
                                    <span class="tag tag-success">{{$listau->estado_mt}}
                                    </span><br>  

                                    @if ($listau->estado_mt =="activo")

                                      <span class="badge bg-danger" role="button" onclick="DesactivarMascota('desactivado',{{$listau->cod_mt}})">Desactivar</span>

                                    @else
                                       <span class="badge bg-success" role="button" onclick="DesactivarMascota('activo',{{$listau->cod_mt}})">Activar</span>
                                    @endif  
                                  </td>

                                  <td>
                                     <!-- <button type="button" class="btn btn-danger">Desactivar</button> -->
                                      <button type="button" class="btn btn-info" onclick="editarMascota()"><i class="fas fa-edit"></i>Editar</button>
                                  </td>                           
                              </tr>

                              @endforeach


                              <!--------- / Codigo php -------------------->
                         
                        </tbody>
                      </table>
                    </div>
@endsection('Cargadato')