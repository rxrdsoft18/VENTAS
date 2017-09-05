@extends('layouts.pdf_create')
@section('title')
  Lista de Ingresos {{$ingreso->proveedor}}
@endsection
@section('impresion')
  Fecha de impresion: {{$date}}
@endsection
@section('contenidoTabla')
  <table class="table table-bordered">
    <thead>
    <tr>
      <th>Codigo</th>
      <th>Articulo</th>
      <th>Cantidad</th>
      <th>Precio Compra</th>
      <th>Precio Venta</th>
      <th>Sub Total</th>
    </tr>
    </thead>
    <tbody>
    @foreach($detalles as $detalle)
      <tr class="data-center">
        <td>{{$detalle->codigo}}</td>
        <td>{{$detalle->nombre}}</td>
        <td>{{$detalle->cantidad}}</td>
        <td>{{$detalle->precio_compra}}</td>
        <td>{{$detalle->precio_venta}}</td>
        <td>{{$detalle->cantidad*$detalle->precio_compra}}</td>
      </tr>
    @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th colspan="5">
          <ul class="detalles">
            <li>IGV(18%):</li>
            <li>TOTAL:</li>
          </ul>
        </th>
        <th>
          <ul class="detalles">
            <li>{{$ingreso->total*0.18}}</li>
            <li>{{$ingreso->total*1.18}}</li>
          </ul>
        </th>
      </tr>
    </tfoot>
  </table>

@endsection