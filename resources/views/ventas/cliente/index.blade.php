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
                  Lista de Clientes
                </h4>
                <p class="category">
                  Todos los clientes
                </p>
              </div>
              <div class="col-md-6">
                @include('ventas.cliente.search')
              </div>
              <div class="col-md-2">
                <a href="cliente/create"><button class="btn btn-white btn-round"><i class="material-icons">person_add</i> Añadir</button></a>
              </div>
            </div>

          </div>
          <div class="card-content table-responsive">
            <table class="table">
              <thead class="text-danger">
              <th>ID</th>
              <th>Nombre</th>
              <th>Tipod Doc.</th>
              <th>Numero Doc.</th>
              <th>Direccion</th>
              <th>Telefono</th>
              <th class="">Acciones</th>
              </thead>
              <tbody>
              @foreach($clientes as $cli)
                <tr>
                  <td>{{$cli->idpersona}}</td>
                  <td>{{$cli->nombre}}</td>
                  <td>{{$cli->tipo_documento}}</td>
                  <td>{{$cli->numero_documento}}</td>
                  <td>{{$cli->direccion}}</td>
                  <td>{{$cli->telefono}}</td>
                  <td class="">
                    <a href="{{route('cliente.edit',$cli->idpersona)}}">
                      <button type="button" rel="tooltip" title="Editar Cliente" class="btn btn-success btn-simple btn-xs">
                        <i class="fa fa-edit"></i>
                      </button>
                    </a>
                    <a href="{{route('cliente.delete',$cli->idpersona)}}">
                      <button type="button" rel="tooltip" title="Eliminar Cliente" class="btn btn-danger btn-simple btn-xs">
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
        {{$clientes->render()}}
      </div>

    </div>
    <a href="{{route('reporte.clientes')}}" class="btn btn-info" target="_blank">Exportar PDF</a>
    <a href="{{route('export.clientes')}}" class="btn btn-warning" target="_blank">Exportar Excel</a>
  </div>

@endsection