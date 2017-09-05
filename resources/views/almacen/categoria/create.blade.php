@extends('layouts.dashboard')
@section('contenido')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header" data-background-color="red">
            <h4 class="title">Nueva Categoria</h4>
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
            {!! Form::open(array('url'=>'almacen/categoria','method'=>'POST','autocomplete'=>'off')) !!}
            {{Form::token()}}
            <div class="row">
              <div class="col-md-6">
                <div class="form-group label-floating">
                  <label class="control-label">Nombre</label>
                  <input type="text"  name="nombre" class="form-control" style="background-image: linear-gradient(#607D8B,#607D8B),linear-gradient(#d2d2d2,#d2d2d2)" >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group label-floating">
                  <label class="control-label">Descripcion</label>
                  <input type="text" name="descripcion" class="form-control" style="background-image: linear-gradient(#607D8B,#607D8B),linear-gradient(#d2d2d2,#d2d2d2)">
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
      <!--<div class="col-md-4">
        <div class="card card-profile">
          <div class="card-avatar">
            <a href="#pablo">
              <img class="img" src="{{asset('img/faces/marc.jpg')}}" />
            </a>
          </div>

          <div class="content">
            <h6 class="category text-gray">CEO / Co-Founder</h6>
            <h4 class="card-title">Alec Thompson</h4>
            <p class="card-content">
              Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
            </p>
            <a href="#pablo" class="btn btn-primary btn-round">Follow</a>
          </div>
        </div>
      </div>
    </div>
  </div> -->
@endsection