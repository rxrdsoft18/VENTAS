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
      <th>Tipo Doc.</th>
      <th>Numero Doc.</th>
      <th>Direccion</th>
      <th>Telefono</th>
      <th>Email</th>
    </tr>
    </thead>
    <tbody>
    @foreach($clientes as $cliente)
      <tr class="data-center">
        <td>{{$cliente->idpersona}}</td>
        <td>{{$cliente->nombre}}</td>
        <td>{{$cliente->tipo_documento}}</td>
        <td>{{$cliente->numero_documento}}</td>
        <td>{{$cliente->direccion}}</td>
        <td>{{$cliente->telefono}}</td>
        <td>{{$cliente->email}}</td>
      </tr>
    @endforeach
    </tbody>
  </table>

@endsection