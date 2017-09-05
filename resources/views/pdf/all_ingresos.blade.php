@extends('layouts.pdf_create')
@section('title')
  Lista de Ingresos VentaFast
@endsection
@section('impresion')
  Fecha de impresion: {{$date}}
@endsection
@section('contenidoTabla')
  <table class="table table-bordered">
    <thead>
    <tr>
      <th>Codigo</th>
      <th>Proveedor</th>
      <th>Comprobante</th>
      <th>Fecha</th>
      <th>Total</th>
    </tr>
    </thead>
    <tbody>
    @foreach($ingresos as $ingreso)
      <tr class="data-center">
        <td>{{$ingreso->idingreso}}</td>
        <td>{{$ingreso->proveedor}}</td>
        <td>{{$ingreso->tipo_comprobante."-".$ingreso->serie_comprobante."-".$ingreso->num_comprobante}}</td>
        <td>{{$ingreso->fecha_hora}}</td>
        <td>{{$ingreso->total*1.18}}</td>
      </tr>
    @endforeach
    </tbody>
  </table>

@endsection