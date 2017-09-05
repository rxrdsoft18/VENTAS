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
                  Lista de Proveedores
                </h4>
                <p class="category">
                  Todos los Proveedores
                </p>
              </div>
              <div class="col-md-6">
                @include('compras.proveedor.search')
              </div>
              <div class="col-md-2">
                <a href="proveedor/create"><button class="btn btn-white btn-round"><i class="material-icons">person_add</i> Añadir</button></a>
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

              @foreach($proveedores as $prove)
                <tr>
                  <td>{{$prove->idpersona}}</td>
                  <td>{{$prove->nombre}}</td>
                  <td>{{$prove->tipo_documento}}</td>
                  <td>{{$prove->numero_documento}}</td>
                  <td>{{$prove->direccion}}</td>
                  <td>{{$prove->telefono}}</td>
                  <td class="">
                    <a href="{{route('proveedor.edit',$prove->idpersona)}}">
                      <button type="button" rel="tooltip" title="Editar Proveedor" class="btn btn-success btn-simple btn-xs">
                        <i class="fa fa-edit"></i>
                      </button>
                    </a>
                    <a href="{{route('proveedor.delete',$prove->idpersona)}}">
                      <button type="button" rel="tooltip" title="Eliminar Proveedor" class="btn btn-danger btn-simple btn-xs">
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
        {{$proveedores->render()}}
      </div>

    </div>
    <a href="{{route('reporte.proveedores')}}" class="btn btn-info" target="_blank">Exportar PDF</a>
    <a href="{{route('export.proveedores')}}" class="btn btn-warning" target="_blank">Exportar Excel</a>
  </div>

@endsection