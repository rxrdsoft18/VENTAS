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
                  Lista de Ingresos
                </h4>
                <p class="category">
                  Todos los ingresos
                </p>
              </div>
              <div class="col-md-6">
                @include('compras.ingreso.search')
              </div>
              <div class="col-md-2">
                <a href="ingreso/create"><button class="btn btn-white btn-round"><i class="material-icons">playlist_add</i> Añadir</button></a>
              </div>
            </div>

          </div>
          <div class="card-content table-responsive">
            <table class="table">
              <thead class="text-danger">
              <th>ID</th>
              <th>Proveedor</th>
              <th>Comprobante</th>
              <th>Fecha</th>
              <th>Impuesto</th>
              <th class="text-center">Estado</th>
              <th>Acciones</th>
              </thead>
              <tbody>

              @foreach($ingresos as $ing)
                <tr>
                  <td>{{$ing->idingreso}}</td>
                  <td>{{$ing->proveedor}}</td>
                  <td>{{$ing->tipo_comprobante.'-'.$ing->serie_comprobante.'-'.$ing->num_comprobante}}</td>
                  <td>{{$ing->fecha_hora}}</td>
                  <td>{{$ing->impuesto}}</td>
                  <td class="text-center">{{$ing->estado}}</td>
                  <td class="">
                    <a href="{{URL::action('IngresoController@show',$ing->idingreso)}}">
                      <button type="button" rel="tooltip" title="Ver Ingreso" class="btn btn-info btn-simple btn-xs">
                        <i class="fa fa-search"></i>
                      </button>
                    </a>
                    <a href="">
                      <button type="button" rel="tooltip" title="Eliminar Ingreso" class="btn btn-danger btn-simple btn-xs">
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
        {{$ingresos->render()}}
      </div>

    </div>
    <a href="{{route('reporte.ingresos')}}" class="btn btn-info" target="_blank">Exportar PDF</a>
    <a href="{{route('export.ingresos')}}" class="btn btn-warning" target="_blank">Exportar Excel</a>
  </div>

@endsection