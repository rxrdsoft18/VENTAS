@extends('layouts.dashboard')
@section('contenido')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header" data-background-color="red">
            <h4 class="title">Nuevo Cliente</h4>
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
            {!! Form::open(array('url'=>'ventas/cliente','method'=>'POST','autocomplete'=>'off')) !!}
            {{Form::token()}}
            <div class="row">
              <div class="col-md-4">
                <div class="form-group label-floating">
                  <label class="control-label">Nombre</label>
                  <input type="text" name="nombre" class="form-control" style="background-image: linear-gradient(#607D8B,#607D8B),linear-gradient(#d2d2d2,#d2d2d2)">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group label-floating">
                  <label class="control-label">Tipo Doc</label>
                  <select name="tipo_documento" id="" class="form-control" style="background-image: linear-gradient(#607D8B,#607D8B),linear-gradient(#d2d2d2,#d2d2d2)">
                    <option value="DNI">DNI</option>
                    <option value="PAS">PAS</option>
                    <option value="RUC">RUC</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group label-floating">
                  <label class="control-label">Numero Doc.</label>
                  <input type="text" name="numero_documento" class="form-control" style="background-image: linear-gradient(#607D8B,#607D8B),linear-gradient(#d2d2d2,#d2d2d2)">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group label-floating">
                  <label class="control-label">Direccion</label>
                  <input type="text" name="direccion" class="form-control" style="background-image: linear-gradient(#607D8B,#607D8B),linear-gradient(#d2d2d2,#d2d2d2)">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group label-floating">
                  <label class="control-label">Telefono</label>
                  <input type="text" name="telefono" class="form-control" style="background-image: linear-gradient(#607D8B,#607D8B),linear-gradient(#d2d2d2,#d2d2d2); opacity: 1;">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group label-floating">
                  <label class="control-label">Email</label>
                  <input type="email" name="email" class="form-control" style="background-image: linear-gradient(#607D8B,#607D8B),linear-gradient(#d2d2d2,#d2d2d2); opacity: 1;">
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