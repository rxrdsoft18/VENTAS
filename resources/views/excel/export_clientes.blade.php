@extends('layouts.excel_create')
@section('contenidoExcel')
  <table>
    <thead>
    <tr class="centrado">
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
      <tr class="centrado">
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