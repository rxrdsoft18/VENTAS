@extends('layouts.pdf_create')
@section('title')
  Lista de Proveedores VentaFast
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
      <th>Tipo Doc.</th>
      <th>Numero Doc.</th>
      <th>Direccion</th>
      <th>Telefono</th>
      <th>Email</th>
    </tr>
    </thead>
    <tbody>
    @foreach($proveedores as $proveedor)
      <tr class="data-center">
        <td>{{$proveedor->idpersona}}</td>
        <td>{{$proveedor->nombre}}</td>
        <td>{{$proveedor->tipo_documento}}</td>
        <td>{{$proveedor->numero_documento}}</td>
        <td>{{$proveedor->direccion}}</td>
        <td>{{$proveedor->telefono}}</td>
        <td>{{$proveedor->email}}</td>
      </tr>
    @endforeach
    </tbody>
  </table>

@endsection