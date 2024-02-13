
<!--Codigo donde enviaremos el (contenido) a (appprincipal)-->
@extends('layouts.appprincipal')





<!---Codigo enpaquetado con el nombre ('contenido')--->
@section('contenido')

<div class="">
	
			Bienvenido: {{Session('usuariologin')[0]['nombreu']}}

</div>
@endsection