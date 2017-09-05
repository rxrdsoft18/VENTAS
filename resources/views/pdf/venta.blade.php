@extends('layouts.pdf_create')
@section('title')
  <div class="info-tienda">
    <h3>VentaFast</h3>
    <h6>Av Iquitos N° 152-La Victoria-Lima-Peru</h6>
    <p>Telf:433-6038 | Claro:978548659 | Email:rxrdsoft@gmail.com</p>
  </div>
@endsection
@section('informacion')
  <div class="info-empresa">
    <h3>R.U.C 20100765790</h3>
    <p>BOLETA DE VENTA ELECTRONICA</p>
    <h4>{{$venta->serie_comprobante."-".$venta->num_comprobante}}</h4>
  </div>
@endsection
@section('contenidoTabla')
  <div class="info-cliente">
    <div class="form-group">
      Nombre: {{$venta->nombre}}
    </div>
    <div class="form-group">
      Tipo Documento: {{$venta->tipo_documento." ".$venta->numero_documento}}
    </div>
    <div class="form-group">
      Direccion: {{$venta->direccion}}
    </div>
    <div class="form-group">
      Condicion de Pago: Contado
    </div>
    <div class="form-group">
      Vendedor: {{Auth::user()->name}}
    </div>
    <div class="form-group">
      Fecha Emision: {{$venta->fecha_hora}}
    </div>

  </div>
  <br>
  <table class="table table-bordered">
    <thead>
    <tr>
      <th>Codigo</th>
      <th>Articulo</th>
      <th>Descripcion</th>
      <th>Cantidad</th>
      <th>Precio Unitario</th>
      <th>Valor Total</th>
    </tr>
    </thead>
    <tbody>
    @foreach($detalles as $detalle)
      <tr class="data-center">
        <td>{{$detalle->codigo}}</td>
        <td>{{$detalle->nombre}}</td>
        <td>{{$detalle->descripcion}}</td>
        <td>{{$detalle->cantidad}}</td>
        <td>{{$detalle->precio_venta}}</td>
        <td>{{$detalle->cantidad*$detalle->precio_venta-$detalle->descuento}}</td>
      </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
      <th colspan="3"></th>
      <th colspan="2">
        <ul class="detalles">
          <li>MONTO ANTICIPADO:</li>
          <li>TOTAL GRAVADO:</li>
          <li>TOTAL INAFECTO:</li>
          <li>TOTAL EXONERADO:</li>
          <li>IGV 18%:</li>
          <li>DESCUENTO:</li>
          <li>IMPORTE TOTAL:</li>
          <li>TOTAL A PAGAR:</li>
        </ul>
      </th>
      <th>
        <ul class="detalles">
          <li>0</li>
          <li>{{$venta->total_venta}}</li>
          <li>0</li>
          <li>0</li>

          <li>{{($venta->total_venta)*0.18}}</li>
          <li>{{$detalle->descuento}}</li>
          <li>{{($venta->total_venta)*1.18}}</li>
          <li>{{($venta->total_venta)*1.18}}</li>
        </ul>
      </th>
    </tr>
    </tfoot>
  </table>

@endsection