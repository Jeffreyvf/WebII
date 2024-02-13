@extends('layouts.applogin')

@section('contenido')

<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="" class="h1"><b>Crear </b> cuenta</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Registrate</p>

      
      <!----------  Formulario de registro ------------>

        <div class="input-group mb-3">
          <input type="text" class="form-control" id="ednombre" placeholder="Nombre">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="eduser" placeholder="Usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="edclave" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="edrepita" placeholder="Repetir contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
          <div class="col-12">
            <button type="button" class="btn btn-danger btn-block" onclick="grabarNuevoUsuario()">Registrar</button>
          </div>
          <!-- /.col -->
        </div>
      
      <!----------  Formulario de registro fin ------------>  

    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

@endsection
