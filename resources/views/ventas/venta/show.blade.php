@extends('layouts.dashboard')
@section('contenido')
  <div class="row">
    <div class="col-md-6">
      <div class="alert alert-warning">
        <div class="container-fluid">
          Cliente : {{$venta->nombre}}
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="alert alert-warning">
        <div class="container-fluid">
          Tipo Comprobante : {{$venta->tipo_comprobante."-".$venta->serie_comprobante."-".$venta->num_comprobante}}
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="alert alert-warning">
        <div class="container-fluid">
          Fecha de venta : {{$venta->fecha_hora}}
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="alert alert-warning">
        <div class="container-fluid">
          Impuesto : {{$venta->impuesto}}%
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="alert alert-warning">
        <div class="container-fluid">
          Estado : {{$venta->estado}}
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header" data-background-color="red">
          <h4 class="title">
            Detalles de Venta
          </h4>
          <p class="category">
            Todos los articulos
          </p>
        </div>
        <div class="card-content table-responsive">
          <table class="table">
            <thead class="text-danger">
            <th>Articulo</th>
            <th>Descripcion</th>
            <th>Cantidad</th>
            <th>Precio Venta</th>
            <th>Descuento</th>
            <th class="text-center">SubTotal</th>
            </thead>
            <tfoot>
            <th>Total</th>
            <th colspan="4"></th>
            <th class="text-center">S/.{{($venta->total_venta)*1.18}}</th>
            </tfoot>
            <tbody>
            @foreach($detalles as $det)
              <tr>
                <td>{{$det->nombre}}</td>
                <td>{{$det->descripcion}}</td>
                <td>{{$det->cantidad}}</td>
                <td>S/.{{$det->precio_venta}}</td>
                <td>S/.{{$det->descuento}}</td>
                <td class="text-center">S/.{{$det->cantidad*$det->precio_venta-$det->descuento}}</td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <a href="{{route('reporte.venta',$idventa)}}" target="_blank" type="button" class="btn btn-info" id="send">Exportar PDF</a>
  <div class="clearfix"></div>
@endsection