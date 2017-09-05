@extends('layouts.dashboard')
@section('contenido')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header" data-background-color="red">
          <div class="row">
            <div class="col-md-4">
              <h4 class="title">
                Lista de Categorias
              </h4>
              <p class="category">
                Solo Categorias activas
              </p>
            </div>
            <div class="col-md-6">
              @include('almacen.categoria.search')
            </div>
            <div class="col-md-2">
              <a href="categoria/create"><button class="btn btn-white btn-round"><i class="material-icons">create</i> Crear</button></a>
            </div>
          </div>

        </div>
        <div class="card-content table-responsive">
          <table class="table">
            <thead class="text-danger">
              <th>ID</th>
              <th>Nombre</th>
              <th>Descripcion</th>
              <th class="">Acciones</th>
            </thead>
            <tbody>
            @foreach($categorias as $cate)
            <tr>
              <td>{{$cate->idcategoria}}</td>
              <td>{{$cate->nombre}}</td>
              <td>{{$cate->descripcion}}</td>
              <td class="">
                <a href="{{route('categoria.edit',$cate->idcategoria)}}">
                  <button type="button" rel="tooltip" title="Editar Categoria" class="btn btn-success btn-simple btn-xs">
                    <i class="fa fa-edit"></i>
                  </button>
                </a>
                <a href="{{route('categoria.delete', $cate->idcategoria)}}?{{time()}}" >
                  <button type="button" rel="tooltip"  title="Eliminar Categoria" class="btn btn-danger btn-simple btn-xs">
                    <i class="fa fa-times"></i>
                  </button>
                </a>
              </td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
      {{$categorias->render()}}
    </div>

  </div>
</div>
@endsection