@extends('layouts.dashboard')
@section('contenido')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header" data-background-color="red">
            <h4 class="title">Editar Proveedor: {{$proveedor->nombre}}</h4>
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

            {!! Form::model($proveedor,['method'=>'PATCH','route'=>['proveedor.edit',$proveedor->idpersona]]) !!}
            {{Form::token()}}
            <div class="row">
              <div class="col-md-4">
                <div class="form-group label-floating">
                  <label class="control-label">Proveedor</label>
                  <input type="text" name="nombre" value="{{$proveedor->nombre}}" class="form-control" style="background-image: linear-gradient(#607D8B,#607D8B),linear-gradient(#d2d2d2,#d2d2d2)">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group label-floating">
                  <label class="control-label">Tipo Doc</label>
                  <select name="tipo_documento" id="" class="form-control" style="background-image: linear-gradient(#607D8B,#607D8B),linear-gradient(#d2d2d2,#d2d2d2)">
                    @if($proveedor->tipo_documento=='DNI')
                      <option selected value="DNI">DNI</option>
                      <option value="PAS">PAS</option>
                      <option value="RUC">RUC</option>
                    @elseif($proveedor->tipo_documento=='RUC')
                      <option value="DNI">DNI</option>
                      <option value="PAS">PAS</option>
                      <option selected value="RUC">RUC</option>
                    @else
                      <option value="DNI">DNI</option>
                      <option selected value="PAS">PAS</option>
                      <option value="RUC">RUC</option>
                    @endif
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group label-floating">
                  <label class="control-label">Numero Doc.</label>
                  <input type="text" name="numero_documento" value="{{$proveedor->numero_documento}}" class="form-control" style="background-image: linear-gradient(#607D8B,#607D8B),linear-gradient(#d2d2d2,#d2d2d2)">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group label-floating">
                  <label class="control-label">Direccion</label>
                  <input type="text" name="direccion" value="{{$proveedor->direccion}}" class="form-control" style="background-image: linear-gradient(#607D8B,#607D8B),linear-gradient(#d2d2d2,#d2d2d2)">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group label-floating">
                  <label class="control-label">Telefono</label>
                  <input type="text" name="telefono" value="{{$proveedor->telefono}}" class="form-control" style="background-image: linear-gradient(#607D8B,#607D8B),linear-gradient(#d2d2d2,#d2d2d2); opacity: 1;">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group label-floating">
                  <label class="control-label">Email</label>
                  <input type="email" name="email" value="{{$proveedor->email}}" class="form-control" style="background-image: linear-gradient(#607D8B,#607D8B),linear-gradient(#d2d2d2,#d2d2d2); opacity: 1;">
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