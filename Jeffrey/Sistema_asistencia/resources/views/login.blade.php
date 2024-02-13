<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="{{asset('jsweb/funciones.js')}}"> </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"> </script> 

    <title>Login</title>
  </head>
  <body class="bg-light">
     
    <div class="row mt-5 pt-5 ">
         <div class="col-2   text-center">  </div>
         <div class="col-8 gb text-center "> 

            <div class="card">
                <div class="card-header fw-bold">
                  
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="ednombre" class="col-sm-2 col-form-label">Usuario </label>
                        <div class="col-sm-10">
                         <input type="text" class="form-control" id="ednombre" onclick="resetCampos('msUSA')">
                          <div id="msUSA" class="text-start text-danger"></div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="edclave" class="col-sm-2 col-form-label">Contraseña</label>
                        <div class="col-sm-10">
                        <input type="password" class="form-control" id="edclave" onclick="resetCampos('msCLAVE')">
                        <div id="msCLAVE" class="text-start text-danger"></div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="validarcampos()"   >Entrar</button>
                    <a href="registro">
                    <button type="button" class="btn btn-warning ms-2" onclick="" >Registro</button></a>

                </div>
            </div>

            

         </div>
         <div class="col-2   text-center">  </div>
    </div>    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>