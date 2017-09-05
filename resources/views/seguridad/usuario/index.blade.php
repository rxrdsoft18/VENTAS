@extends('layouts.dashboard')
@section('contenido')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header" data-background-color="red">
            <div class="row">
              <div class="col-md-4">
                <h4 class="title">
                  Lista de Usuarios
                </h4>
                <p class="category">
                  Todos los usuarios activos
                </p>
              </div>
              <div class="col-md-6">
                @include('seguridad.usuario.search')
              </div>
              <div class="col-md-2">
                <a href="usuario/create"><button class="btn btn-white btn-round"><i class="material-icons">person_add</i> Añadir</button></a>
              </div>
            </div>

          </div>
          <div class="card-content table-responsive">
            <table class="table">
              <thead class="text-danger">
              <th>ID</th>
              <th>Nombre</th>
              <th>Email</th>
              <th>Fecha Registro</th>
              <th class="">Acciones</th>
              </thead>
              <tbody>

              @foreach($usuarios as $usu)
                <tr>
                  <td>{{$usu->id}}</td>
                  <td>{{$usu->name}}</td>
                  <td>{{$usu->email}}</td>
                  <td>{{$usu->created_at}}</td>
                  <td class="">
                    <a href="{{route('usuario.edit',$usu->id)}}">
                      <button type="button" rel="tooltip" title="Editar Usuario" class="btn btn-success btn-simple btn-xs">
                        <i class="fa fa-edit"></i>
                      </button>
                    </a>
                    <a href="{{route('usuario.delete',$usu->id)}}">
                      <button type="button" rel="tooltip" title="Eliminar Usuario" class="btn btn-danger btn-simple btn-xs">
                        <i class="fa fa-times"></i>
                      </button>
                    </a>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
        {{$usuarios->render()}}
      </div>

    </div>
  </div>

@endsection