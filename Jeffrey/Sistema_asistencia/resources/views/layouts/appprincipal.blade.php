<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema-ASS</title>

  <!---AGregamos las librerias estilos de css--->
  @include('layouts.estilos')

</head>
  <body class="hold-transition sidebar-mini layout-fixed">
  @include('layouts.navbar') 
  @include('layouts.sidebar')
  <div class="wrapper">  

        @yield('contenido')

  </div>    
       <!---AGregamos las librerias scripts--->
  @include('layouts.scripts')

  </body>
</html>