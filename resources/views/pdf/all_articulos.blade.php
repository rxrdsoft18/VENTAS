@extends('layouts.pdf_create')
@section('title')
  Lista de Articulos VentaFast
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
      <th>Descripcion</th>
      <th>Categoria</th>
      <th>Stock</th>
      <th>Estado</th>
    </tr>
    </thead>
    <tbody>
    @foreach($articulos as $articulo)
      <tr class="data-center">
        <td>{{$articulo->codigo}}</td>
        <td>{{$articulo->nombre}}</td>
        <td>{{$articulo->descripcion}}</td>
        <td>{{$articulo->categoria}}</td>
        <td>{{$articulo->stock}}</td>
        <td>{{$articulo->estado}}</td>
      </tr>
    @endforeach
    </tbody>
  </table>

@endsection