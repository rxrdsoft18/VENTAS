@extends('layouts.pdf_create')
@section('title')
  Lista de Clientes VentaFast
@endsection
@section('impresion')
  Fecha de impresion: {{$date}}
@endsection
@section('contenidoTabla')
  <table class="table table-bordered">
    <thead>
    <tr>
      <th>Codigo</th>
      <th>Nombre</th>
      <th>Comprobante</th>
      <th>Fecha</th>
      <th>Total</th>
    </tr>
    </thead>
    <tbody>
    @foreach($ventas as $venta)
      <tr class="data-center">
        <td>{{$venta->idventa}}</td>
        <td>{{$venta->cliente}}</td>
        <td>{{$venta->tipo_comprobante."-".$venta->serie_comprobante."-".$venta->num_comprobante}}</td>
        <td>{{$venta->fecha_hora}}</td>
        <td>{{$venta->total_venta*1.18}}</td>
      </tr>
    @endforeach
    </tbody>
  </table>

@endsection