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
                  Lista de Ventas
                </h4>
                <p class="category">
                  Todass los ventas
                </p>
              </div>
              <div class="col-md-6">
                @include('ventas.venta.search')
              </div>
              <div class="col-md-2">
                <a href="venta/create"><button class="btn btn-white btn-round"><i class="material-icons">store</i> Crear</button></a>
              </div>
            </div>

          </div>
          <div class="card-content table-responsive">
            <table class="table">
              <thead class="text-danger">
              <th>ID</th>
              <th>Cliente</th>
              <th>Comprobante</th>
              <th>Fecha</th>
              <th>Impuesto</th>
              <th class="text-center">Total Venta</th>
              <th class="text-center">Estado</th>
              <th>Acciones</th>
              </thead>
              <tbody>

              @foreach($ventas as $vent)
                <tr>
                  <td>{{$vent->idventa}}</td>
                  <td>{{$vent->cliente}}</td>
                  <td>{{$vent->tipo_comprobante.'-'.$vent->serie_comprobante.'-'.$vent->num_comprobante}}</td>
                  <td>{{$vent->fecha_hora}}</td>
                  <td>{{$vent->impuesto}}</td>
                  <td class="text-center">S/.{{$vent->total_venta}}</td>
                  <td class="text-center">{{$vent->estado}}</td>
                  <td class="">
                    <a href="{{route('venta.show',$vent->idventa)}}">
                      <button type="button" rel="tooltip" title="Ver Venta" class="btn btn-info btn-simple btn-xs">
                        <i class="fa fa-search"></i>
                      </button>
                    </a>
                    <a href="">
                      <button type="button" rel="tooltip" title="Eliminar Venta" class="btn btn-danger btn-simple btn-xs">
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
        {{$ventas->render()}}
      </div>
    </div>
    <a href="{{route('reporte.ventas')}}" class="btn btn-info" target="_blank">Exportar PDF</a>
    <a href="{{route('export.ventas')}}" class="btn btn-warning" target="_blank">Exportar Excel</a>
  </div>

@endsection