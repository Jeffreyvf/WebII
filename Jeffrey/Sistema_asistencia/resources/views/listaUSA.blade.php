@section('Cargadato')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
              <h1>
              <i class="fas fa-user-plus"></i>
              Agregar Usuario
                <button type="button" class="btn btn-dark" onclick="nuevoUsuario('nuevo')">

                  <i class="fas fa-user-plus">

                 </i> Agregar
               </button>

               <a href="{{asset('verPDF')}}" class="btn btn-primary btn-ms">
                  <i class="fas fa-file-pdf"></i>
                  Imprimir
               </a>
               
              </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">ADM</a></li>
              <li class="breadcrumb-item active">Usuarios</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <!-- row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header ">

                <div class="row">
                    <!----Filtrar estado--->
                    <div class="col-4">
                      <h3 class="card-title"> Estado </h3> 
                                                    
                            <select class="form-select form-control" onchange="filtrarusuario()" id="edestado">
                              <option value="todos">Todos</option>
                              <option value="activo">Activos</option>
                              <option value="desactivado">Desactivos</option>
                            </select>                        
                     
                    </div>
                    <!----Filtro de nacionalidad ----->
                    <div class="col-4">
                      <h3 class="card-title">Cargos</h3>
                                                                     
                            <select class="form-select form-control" id="edcargo" onchange="filtrarusuario()">
                              <option value="todos">Todos</option>
                              <option value="administrador">Administrador</option>
                              <option value="empleado">Empleado</option>
                              <option value="gerente">Gerente</option>
                            </select>                       
                       
                    </div>
                    <!----Filtro Buscar------->
                    <div class="col-4">
                          <h3 class="card-title">Buscar usuario</h3>
                          <div class="card-tools">
                            <div class="input-group " >
                              <input type="text" 
                              onkeypress=" handleKeyPress(event)" name="edbusca"  id="edbusca" class="form-control float-right" 
                              placeholder="Buscar">

                              <div class="input-group-append">
                                <button type="submit" class="btn btn-default" onclick="filtrarusuario()">
                                  <i class="fas fa-search"></i>
                                </button>
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
              </div>

              <!---Cargado del efecto spinner en la tabla filtrar--->
              <div class="text-center mt-5" id="loadingDetalle" style="display: none">
                  <div class="spinner-border" role="status">
                    <span class="sr-only">Cargando...</span>    
                  </div>
              </div>
              <!--Vista renderizada filtros--->
              <!-- /.card-header -->
              <div id="paneldetalle">                  
                    <div class="card-body table-responsive p-0">
                      <table class="table table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Nombre </th>
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
              </div>
              <!-- /.card-body -->  
              <!--/.Vista renderizada filtros--->
              
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection('Cargadato')