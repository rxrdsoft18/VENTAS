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
                  Lista de Articulos
                </h4>
                <p class="category">
                  Todos los articulos
                </p>
              </div>
              <div class="col-md-6">
                @include('almacen.articulo.search')
              </div>
              <div class="col-md-2">
                <a href="articulo/create"><button class="btn btn-white btn-round"><i class="material-icons">library_add</i> Añadir</button></a>
              </div>
            </div>

          </div>
          <div class="card-content table-responsive">
            <table class="table">
              <thead class="text-danger">
              <th>Codigo</th>
              <th>Nombre</th>
              <th>Categoria</th>
              <th>Stock</th>
              <th class="text-center">Foto</th>
              <th>Estado</th>
              <th class="">Acciones</th>
              </thead>
              <tbody>
              @foreach($articulos as $art)
                <tr>
                  <td>{{$art->codigo}}</td>
                  <td>{{$art->nombre}}</td>
                  <td>{{$art->categoria}}</td>
                  <td>{{$art->stock}}</td>
                  <td style="width: 100px; height: 100px">
                    <img src="{{asset('imagenes/articulos/'.$art->imagen)}}" alt="">
                  </td>
                  <td>{{$art->estado}}</td>
                  <td class="">
                    <a href="{{route('articulo.edit',$art->idarticulo)}}">
                      <button type="button" rel="tooltip" title="Editar Aticulo" class="btn btn-success btn-simple btn-xs">
                        <i class="fa fa-edit"></i>
                      </button>
                    </a>
                    <a href="{{route('articulo.delete',$art->idarticulo)}}">
                      <button type="button" rel="tooltip" title="Eliminar Articulo" class="btn btn-danger btn-simple btn-xs">
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
        {{$articulos->render()}}
      </div>

    </div>
    <a href="{{route('reporte.articulos')}}" class="btn btn-info" target="_blank">Exportar PDF</a>
    <a href="{{route('export.articulos')}}" class="btn btn-warning" target="_blank">Exportar Excel</a>
  </div>

@endsection