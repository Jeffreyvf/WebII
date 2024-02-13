@extends('layouts.applogin')

@section('contenido')
    <!--login Logo-->
  <div class="card card-outline card-primary">    
    <div class="card-header text-center">
      <a href="" class="h1"><b>Bienvenido</b></a>
    </div>

    <!-- Diseño login -->
    <div class="card-body">
      <p class="login-box-msg">Inicio de Session</p>

      
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="ednombre" onclick="resetCampos('msUSA')"   placeholder="Usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div> 
        </div>
          <!-- Mensaje de validación usuario--->
          <div id="msUSA" class="text-start text-danger"></div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="edclave" onclick="resetCampos('msCLAVE')" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span> 
            </div>
          </div>
        </div>
          <!-- Mensaje de validación pasword--->
          <div id="msCLAVE" class="text-start text-danger"></div>
        <div class="row">
          <!--<div class="col-8">
        
          </div>-->
          <!-- /.col -->
          <div class="col-12">
            <button type="button" class="btn btn-danger btn-block" onclick="validarcampos()">Inicio</button>
          </div>
          <!-- /.col -->
        </div>
      

      <!--
      <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      -->
      <!-- /.social-auth-links -->


      <p class="mb-1">
        <a href="">Olvidé mi contraseña</a>
      </p>
      <p class="mb-0">
        <a href="/registro" class="text-center">Registra cuenta nueva</a>
      </p>
    </div>
  </div>  
    <!-- /.Diseño login -->
 
@endsection
