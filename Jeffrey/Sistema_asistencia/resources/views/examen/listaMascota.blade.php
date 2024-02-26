@section('Cargadato')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
              <h1>
             <i class="fas fa-dog"></i>
              Agregar Mascota
                <button type="button" class="btn btn-dark" onclick="nuevoMascota('nuevo')">

                  <i class="fas fa-paw"></i>

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
                    <div class="col-3">
                      <h3 class="card-title"> Estado </h3> 
                                                    
                            <select class="form-select form-control" onchange="filtrarMascota()" id="edestado">
                              <option value="todos">Todos</option>
                              <option value="activo">Activos</option>
                              <option value="desactivado">Desactivos</option>
                            </select>                        
                     
                    </div>
                    <!----Filtro de tipo mascota ----->
                    <div class="col-3">
                      <h3 class="card-title">Tipo</h3>
                                                                     
                             <select class="form-select form-control" id="edtipo" onchange="filtrarMascota()">
                              <option value="todos">Todos</option>
                              <option value="gato">Gatos</option>
                              <option value="perro">Perros</option>
                              <option value="ave">Aves</option>
                            </select>                       
                       
                    </div>
                    <!----Filtro por raza ----->
                    <div class="col-3">
                            <h3 class="card-title">Raza</h3>
                                                                     
                            <select class="form-select form-control" id="edraza" onchange="filtrarMascota()">
                              <option value="todos">Todas</option>
                              @foreach($lraza as $listaraza)
                              <option value="{{$listaraza->nombre_rz}}">{{$listaraza->nombre_rz}}</option>
                              @endforeach
                            </select>                       
                       
                    </div>
                    <!----Filtro Buscar por dueño de la mascota------->
                    <div class="col-3">
                          <h3 class="card-title">Buscar propietario</h3>
                          <div class="card-tools">
                            <div class="input-group " >
                              <input type="text" 
                              onkeypress=" handleKeyPress(event)"  name="eddueño"  id="eddueño" class="form-control float-right" 
                              placeholder="Buscar">

                              <div class="input-group-append">
                                <button type="submit" class="btn btn-default"  onclick="filtrarMascota()" >
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