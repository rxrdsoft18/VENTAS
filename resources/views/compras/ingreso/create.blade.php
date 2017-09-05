@extends('layouts.dashboard')
@section('contenido')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header" data-background-color="red">
            <h4 class="title">Nuevo Ingreso</h4>
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
            {!! Form::open(array('url'=>'compras/ingreso','method'=>'POST','autocomplete'=>'off')) !!}
            {{Form::token()}}
            <div class="row">
              <div class="col-md-6">
                <div class="form-group label-floating">
                  <label class="control-label">Proveedor</label>
                  <select name="idproveedor" id="" class="form-control" style="background-image: linear-gradient(#607D8B,#607D8B),linear-gradient(#d2d2d2,#d2d2d2)">
                    @foreach($proveedores as $prove)
                      <option value="{{$prove->idpersona}}">{{$prove->nombre}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group label-floating">
                  <label class="control-label">Tipo Comprobante</label>
                  <select name="tipo_comprobante" id=""class="form-control" style="background-image: linear-gradient(#607D8B,#607D8B),linear-gradient(#d2d2d2,#d2d2d2)">
                    <option value="BOLETA">BOLETA</option>
                    <option value="TICKET">TICKET</option>
                    <option value="FACTURA">FACTURA</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group label-floating">
                  <label class="control-label">Serie Comprobante</label>
                  <input type="text" name="serie_comprobante" class="form-control" style="background-image: linear-gradient(#607D8B,#607D8B),linear-gradient(#d2d2d2,#d2d2d2)">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group label-floating">
                  <label class="control-label">Numero Comprobante</label>
                  <input type="text" name="num_comprobante" class="form-control" style="background-image: linear-gradient(#607D8B,#607D8B),linear-gradient(#d2d2d2,#d2d2d2)">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group label-floating">
                        <label class="control-label">Articulo</label>
                        <select id="temp_articulo" class="form-control" style="background-image: linear-gradient(#607D8B,#607D8B),linear-gradient(#d2d2d2,#d2d2d2)">
                          @foreach($articulos as $art)
                            <option value="{{$art->idarticulo}}">{{$art->nombre}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group label-floating">
                        <label class="control-label" >Cantidad</label>
                        <input type="number" id="temp_cantidad" class="form-control" style="background-image: linear-gradient(#607D8B,#607D8B),linear-gradient(#d2d2d2,#d2d2d2)">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group label-floating">
                        <label class="control-label">Precio Compra</label>
                        <input type="number" id="temp_precio_compra" class="form-control" style="background-image: linear-gradient(#607D8B,#607D8B),linear-gradient(#d2d2d2,#d2d2d2)">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group label-floating">
                        <label class="control-label">Precio Venta</label>
                        <input type="number"  id="temp_precio_venta" class="form-control" style="background-image: linear-gradient(#607D8B,#607D8B),linear-gradient(#d2d2d2,#d2d2d2)">
                      </div>
                    </div>
                    <div class="col-md-1 text-center">
                      <button  type="button" class="btn btn-default btn-just-icon" id="agregar">
                        <i class="material-icons">add</i>
                      </button>
                    </div>
                  </div>
                </div>
                <div class="panel-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                      <tr class="text-info">
                        <th class="text-center"></th>
                        <th>Articulo</th>
                        <th>Cantidad</th>
                        <th>Precio Compra</th>
                        <th>Precio Venta</th>
                        <th>Subtotal</th>
                      </tr>
                      </thead>
                      <tfoot>
                      <th class="text-center">Total</th>
                      <th colspan="4"></th>
                      <th id="total">S/.0.0</th>
                      </tfoot>
                      <tbody id="contenido">
                      </tbody>
                    </table>
                  </div>

                </div>
              </div>
            </div>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <button disabled type="submit" class="btn btn-success" id="send">Guardar</button>
            <button type="reset" class="btn btn-warning">Cancelar</button>
            <div class="clearfix"></div>
            {{Form::close()}}
          </div>
        </div>
      </div>
    </div>
  </div>
@push('detalleIngreso')
  <script>
    $(document).ready(function(){

      /*$('#temp_articulo').change(function(){
        //alert($(this).children('option:selected').data('cantidad'));
        $('#temp_cantidad').val($(this).children('option:selected').data('cantidad'));
        idarticulo=$(this).val();
        articulo_name=$(this).children('option:selected').text();
        alert(articulo_name)
      })*/
      $('#agregar').click(function(){
        //$('#contenido').append(fila);
        agregar();
      });
    });
    var cont=0;
    subtotal=[];
    total=0;

      function agregar()
      {
        idarticulo=$('#temp_articulo').val();
        articulo_name=$('#temp_articulo option:selected').text();
        cantidad=$('#temp_cantidad').val();
        precio_compra=$('#temp_precio_compra').val();
        precio_venta=$('#temp_precio_venta').val();

        if(idarticulo!='' && articulo_name!='' && cantidad>0 && precio_compra!='' && precio_venta!='')
        {
          subtotal[cont]=cantidad*precio_compra;
          total=total+cantidad*precio_compra;
          var fila=`
            <tr id="fila${cont}">
              <td class="text-center">
                <button type="button" rel="tooltip" onclick="eliminar(${cont})" title="Remove" class="btn btn-danger btn-simple btn-xs">
                  <i class="fa fa-times"></i>
                </button>
              </td>
              <td>
                <input type="hidden" name="idarticulo[]" value="${idarticulo}">
                ${articulo_name}
              </td>
              <td>
                <input type="hidden" name="cantidad[]"  value="${cantidad}">
                ${cantidad}
              </td>
              <td>
                <input type="hidden" name="precio_compra[]" value="${precio_compra}">
                ${precio_compra}
              </td>
              <td>
                <input type="hidden" name="precio_venta[]" value="${precio_venta}">
                ${precio_venta}
              </td>
              <td>${subtotal[cont]}</td>
            </tr>
          `;
          cont++;
          limpiar();
          $('#total').html('S/.'+total);
          evaluar();
          $('#contenido').append(fila);

        }
        else
        {
          alert('Errores al añadir los detalles, revise por favor!')
        }
      }
      function limpiar()
      {
        $('#temp_cantidad').val('');
        $('#temp_precio_compra').val('');
        $('#temp_precio_venta').val('');
      }

      function eliminar(indice)
      {
        total=total-subtotal[indice];
        $('#total').html('S/.'+total);
        $('#fila'+indice).remove();
        evaluar();
      }

      function evaluar()
      {
        if(total>0)
        {
          $('#send').removeAttr('disabled');
      }
        else
        {
          $('#send').attr('disabled','disabled');
        }
      }

      /*function ver()
      {
        $('input#cantidad_article').each(function() {
          console.log($(this).val());
        });
      }*/

  </script>
@endpush
@endsection