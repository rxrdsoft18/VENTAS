@extends('layouts.excel_create')
@section('contenidoExcel')
  <table>
    <thead>
    <tr class="centrado">
      <th>Codigo</th>
      <th>Nombre</th>
      <th>Comprobante</th>
      <th>Fecha</th>
      <th>Impuesto</th>
      <th>Estado</th>
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
        <td>{{$venta->impuesto}}</td>
        <td>{{$venta->estado}}</td>
        <td>{{$venta->total_venta}}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
@endsection