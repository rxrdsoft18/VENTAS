  {!! Form::open(array('url'=>'almacen/categoria','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}

    <div class="input-group">
      <input type="text" class="form-control" name="buscarTexto" value="{{$buscarTexto}}" placeholder="Buscar.." style="background-image: linear-gradient(#d2d2d2,#d2d2d2),linear-gradient(#d2d2d2,#d2d2d2)">
      <div class="input-group-addon">
        <button type="submit" class="btn btn-white btn-just-icon"><i class="material-icons">search</i></button>
      </div>
    </div>

  {{Form::close()}}