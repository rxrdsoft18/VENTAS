@extends('layouts.dashboard')
@section('contenido')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header" data-background-color="red">
            <h4 class="title">Nuevo Articulo</h4>
            <p class="category">
            @if(count($errors)>0)
              <div class="alert alert-danger">
                <ul>
                  @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                  @endforeach
                </ul>
              </div>
              @endif
            </p>
          </div>
          <div class="card-content">
            {!! Form::open(array('url'=>'almacen/articulo','method'=>'POST','autocomplete'=>'off','files'=>'true')) !!}
            {{Form::token()}}
            <div class="row">
              <div class="col-md-4">
                <div class="form-group label-floating">
                  <label class="control-label">Categoria</label>
                  <select name="idcategoria" id="" class="form-control" style="background-image: linear-gradient(#607D8B,#607D8B),linear-gradient(#d2d2d2,#d2d2d2)">
                    @foreach($categorias as $cate)
                      <option value="{{$cate->idcategoria}}">{{$cate->nombre}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group label-floating">
                  <label class="control-label">Codigo</label>
                  <input type="text" name="codigo" class="form-control" style="background-image: linear-gradient(#607D8B,#607D8B),linear-gradient(#d2d2d2,#d2d2d2)">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group label-floating">
                  <label class="control-label">Nombre</label>
                  <input type="text" name="nombre" class="form-control" style="background-image: linear-gradient(#607D8B,#607D8B),linear-gradient(#d2d2d2,#d2d2d2)">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group label-floating">
                  <label class="control-label">Stock</label>
                  <input type="text" name="stock" value="0" disabled class="form-control" style="background-image: linear-gradient(#607D8B,#607D8B),linear-gradient(#d2d2d2,#d2d2d2)">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group label-floating">
                  <label class="control-label">Descripcion</label>
                  <input type="text" name="descripcion" class="form-control" style="background-image: linear-gradient(#607D8B,#607D8B),linear-gradient(#d2d2d2,#d2d2d2)">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <input type="file" name="imagen" class="form-control" style="background-image: linear-gradient(#607D8B,#607D8B),linear-gradient(#d2d2d2,#d2d2d2); opacity: 1;">
                </div>
              </div>
            </div>

            <button type="submit" class="btn btn-success">Guardar</button>
            <button type="reset" class="btn btn-warning">Cancelar</button>
            <div class="clearfix"></div>

            {{Form::close()}}
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection