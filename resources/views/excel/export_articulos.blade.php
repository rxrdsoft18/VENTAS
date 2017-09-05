@extends('layouts.excel_create')
@section('contenidoExcel')
  <table>
    <thead>
    <tr class="centrado">
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
      <tr class="centrado">
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