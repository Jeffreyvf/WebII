@extends('layouts.appprincipal')

@section('contenido')


	 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
              <h1>
              <i class="fas fa-user-plus"></i>
              Agregar Usuario

                <button type="button" class="btn btn-dark"><i class="fas fa-user-plus"> </i> Agregar</button>
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
                <h3 class="card-title">
                  <i class="fas fa-list-alt">
                    
                  </i>
                  Lista usuarios
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
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nombre Usuario</th>
                      <th>Usuario</th>
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
                          <td>
                            <span class="tag tag-success">{{$listau->estado_u}}
                            </span><br>  

                            <span class="badge btn-danger">Desactivar</span>

                            @if($listau->estado_u== "Activo")
                              <span class="badge btn-danger">Desactivar</span>

                            @else
                               <span class="badge btn-success">Activar</span>
                            @endif  

                          </td>

                          <td>
                             <!-- <button type="button" class="btn btn-danger">Desactivar</button> -->

                              <button type="button" class="btn btn-info"><i class="fas fa-edit"></i>Editar</button>
                          </td>

                         
                          
                        </tr>

                        @endforeach


                        <!--------- / Codigo php -------------------->
                   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection