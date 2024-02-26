@section('Cargadato')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
              <h1>
              <i class="fas fa-user-plus"></i>
              Editar usuario

                <button type="button" class="btn btn-success" onclick="listadeUsurio('principal')">Volver</button>

                <button type="button" class="btn btn-danger" onclick= "actualizaUser({{$cod_u}})"> Actualizar Usuario</button>
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
                  
                  Ingrese los datos correspondientes
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
                        <!------ nombre-------->
                      @foreach ($listausa as $listau)
                        <div class="col-3">

                            <div class="">
                               <label for="exampleFormControlInput1" class="form-label">Nombre:</label>
                               <input type="text" class="form-control" id="Nnombre" placeholder="Nombre" value="{{$listau->nombre_u}}">

                            </div>
                        </div>

                        <!------ nombre usuario-------->
                        <div class="col-3">

                            <div class="">
                               <label for="exampleFormControlInput1" class="form-label">Usuario:</label>
                               <input type="text" class="form-control" id="Nusuario" placeholder="Usuario" value="{{$listau->user_u}}">

                            </div>
                        </div>

                        <!------ clave o contraseña-------->
                        <div class="col-2">

                            <div class="">
                               <label for="exampleFormControlInput1" class="form-label">Clave:</label>
                               <input type="password" class="form-control" id="Nclave" placeholder="Clave" value="{{$listau->clave_u}}">

                            </div>
                        </div>

                        <!------ cargo del usaurio -------->
                        <div class="col-2"> 

                              <label for="exampleFormControlInput1" class="form-label">Cargo:</label> 
                              <select class="form-select form-control" id="Ncargo">

                                <option value="todos" {{('todos'== $listau->cargo_u)? 'selected ':'' }}>Todos</option>
                                <option value="administrador" {{('administrador'== $listau->cargo_u)? 'selected ':'' }}>Administrador</option>
                                <option value="empleado" {{('empleado'== $listau->cargo_u)? 'selected ':'' }}>Empleado</option>
                                <option value="gerente" {{('gerente'== $listau->cargo_u)? 'selected ':'' }}>Gerente</option>

                              </select>
                        </div>      

                    <div class="col-2">
                    </div>
                    @endforeach  
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