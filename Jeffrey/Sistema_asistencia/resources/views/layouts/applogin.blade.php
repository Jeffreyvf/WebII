<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--codigo para proteger datos--->
  <meta name="csrf-token" content="{{csrf_token()}}">
  <meta name="csrf-token" content="{{csrf_token()}}">
  
  <title>Login</title>

  <!---AGregamos las librerias estilos de css--->
  @include('layouts.estilos')

</head>
  <body class="hold-transition login-page">  
  <div class="login-box">

    @yield('contenido')

    
  </div>

   <!---AGregamos las librerias scripts--->
   @include('layouts.scripts')

  </body>
</html>