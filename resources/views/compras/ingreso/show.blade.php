@extends('layouts.dashboard')
@section('contenido')
<div class="row">
  <div class="col-md-6">
    <div class="alert alert-warning">
      <div class="container-fluid">
        Proveedor : {{$ingreso->proveedor}}
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="alert alert-warning">
      <div class="container-fluid">
        Tipo Comprobante : {{$ingreso->tipo_comprobante."-".$ingreso->serie_comprobante."-".$ingreso->num_comprobante}}
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="alert alert-warning">
      <div class="container-fluid">
        Fecha de ingreso : {{$ingreso->fecha_hora}}
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="alert alert-warning">
      <div class="container-fluid">
        Impuesto : {{$ingreso->impuesto}}%
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="alert alert-success">
      <div class="container-fluid">
        Estado : {{$ingreso->estado}}
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header" data-background-color="red">
        <h4 class="title">
          Detalles de ingresos
        </h4>
        <p class="category">
          Todos los ingresos
        </p>
      </div>
      <div class="card-content table-responsive">
        <table class="table">
          <thead class="text-danger">
            <th>Codigo</th>
            <th>Articulo</th>
            <th>Cantidad</th>
            <th>Precio Compra</th>
            <th>Precio Venta</th>
            <th class="text-center">SubTotal</th>
          </thead>
          <tfoot>
            <th>Total</th>
            <th colspan="4"></th>
            <th class="text-center">S/.{{$ingreso->total*1.18}}</th>
          </tfoot>
          <tbody>
          @foreach($detalle as $det)
            <tr>
              <td>{{$det->codigo}}</td>
              <td>{{$det->nombre}}</td>
              <td>{{$det->cantidad}}</td>
              <td>S/.{{$det->precio_compra}}</td>
              <td>S/.{{$det->precio_venta}}</td>
              <td class="text-center">S/.{{$det->cantidad*$det->precio_compra}}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<a href="{{route('reporte.ingreso',$ingreso->idingreso)}}" target="_blank" type="button" class="btn btn-info" id="send">Exportar PDF</a>
<div class="clearfix"></div>
@endsection