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

                <button type="button" class="btn btn-success" onclick="listaMascotas('principal')">Volver</button>

                <button type="button" class="btn btn-danger" onclick="RegistrarNuevamascota()"> Grabar mascota</button>
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
        
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header ">
                <h3 class="card-title">
                  
                  Ingrese los datos de la mascota
                </h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>

              </div>
              <!-- /.card header-->
              <div class="card-body">
                  <div class="row">
                    <div class="col-2">
                    </div>
                        <!--- nombre  mascota--->
                        <div class="col-3">

                            <div class="">
                               <label for="exampleFormControlInput1" class="form-label">Nombre mascota:</label>
                               <input type="text" class="form-control" id="idmascota" placeholder="Nombre">

                            </div>
                        </div>

                        <!--- detalle mascota--->
                        <div class="col-3">

                            <div class="">
                               <label for="exampleFormControlInput1" class="form-label">Detalle mascota:</label>
                               <input type="text" class="form-control" id="iddetalle" placeholder="Nombre">

                            </div>
                        </div>

                        <!--- raaza mascota--->
                        <div class="col-3">

                            <div class="">
                               <label for="exampleFormControlInput1" class="form-label">Raza:</label>
                                <select class="form-select form-control" id="idraza" onchange="">

                                    <option value="Todas">Todos</option>
                                    @foreach($lraza as $listaraza)

                                    <option value="{{$listaraza->nombre_rz}}">{{$listaraza->nombre_rz}}</option>

                                    @endforeach
                                </select> 
                            </div>
                        </div>

                        <!--- tipo mascota--->
                        <div class="col-4">

                            <div class="">
                               <label for="exampleFormControlInput1" class="form-label">Tipo mascota:</label>
                               <select class="form-select form-control" id="idtipo" onchange="">
                                  <option value="Todos">Todos</option>
                                  <option value="Gato">Gato</option>
                                  <option value="Perro">Perro</option>
                                  <option value="Ave">Ave</option>
                                  
                               </select>

                            </div>
                        </div>

                        <!--- dueño de la mascota--->
                        <div class="col-4">

                              <div class="">
                                  <label for="exampleFormControlInput1" class="form-label">Dueño mascota:</label>
                                    <select class="form-select form-control" id="iddueño" onchange="">
                                        <option value="Todas">Todos</option>
                                        @foreach($lpersona as $listaper)

                                        <option value="{{$listaper->cod_pe}}">{{$listaper->nombre_pe}}</option>

                                        @endforeach
                                    </select>
                              </div>
                        </div>      

                    <div class="col-2">
                    </div>  

                  </div>  
              </div>

            </div>
          </div>

        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection('Cargadato')