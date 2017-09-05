@extends('layouts.dashboard')
@section('contenido')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header" data-background-color="red">
            <h4 class="title">Nueva Venta</h4>
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
            {!! Form::open(array('url'=>'ventas/venta','method'=>'POST','autocomplete'=>'off')) !!}
            {{Form::token()}}
            <div class="row">
              <div class="col-md-6">
                <div class="form-group label-floating">
                  <label class="control-label">Cliente</label>
                  <select name="idcliente" id="" class="form-control" style="background-image: linear-gradient(#607D8B,#607D8B),linear-gradient(#d2d2d2,#d2d2d2)">
                    @foreach($clientes as $cli)
                      <option value="{{$cli->idpersona}}">{{$cli->nombre}}</option>
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
                            <option data-descripcion="{{$art->descripcion}}" data-pventa="{{number_format($art->precio_venta,2)}}" data-cantidad="{{$art->stock}}" value="{{$art->idarticulo}}">{{$art->nombre}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group label-floating">
                        <label class="control-label" >Cantidad</label>
                        <input  type="number" id="temp_cantidad" class="form-control" style="background-image: linear-gradient(#607D8B,#607D8B),linear-gradient(#d2d2d2,#d2d2d2)">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group label-floating is-focused">
                        <label class="control-label" >Stock</label>
                        <input disabled type="number" id="temp_stock" class="form-control" style="background-image: linear-gradient(#d2d2d2,#d2d2d2),linear-gradient(#d2d2d2,#d2d2d2)">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group label-floating is-focused">
                        <label class="control-label">Precio Venta</label>
                        <input disabled type="number" id="temp_precio_venta" class="form-control" style="background-image: linear-gradient(#d2d2d2,#d2d2d2),linear-gradient(#d2d2d2,#d2d2d2)">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group label-floating">
                        <label class="control-label">Descuento</label>
                        <input type="number"  id="temp_descuento" value="0" class="form-control" style="background-image: linear-gradient(#607D8B,#607D8B),linear-gradient(#d2d2d2,#d2d2d2)">
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
                        <th>Descripcion</th>
                        <th>Cantidad</th>
                        <th>Precio Venta</th>
                        <th>Descuento</th>
                        <th>Subtotal</th>
                      </tr>
                      </thead>
                      <tfoot>
                      <th class="text-center">Total</th>
                      <th colspan="5"></th>
                      <th id="total">S/.0.0</th>
                      <input type="hidden" class="total_venta" name="total_venta">
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

        $('#temp_articulo').change(function(){
          //alert($(this).children('option:selected').data('cantidad'));
          $('#temp_stock').val($(this).children('option:selected').data('cantidad'));
          $('#temp_precio_venta').val($(this).children('option:selected').data('pventa'));
          //idarticulo=$(this).val();
         // articulo_name=$(this).children('option:selected').text();
        })
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
        descripcion=$('#temp_articulo option:selected').data('descripcion')
        cantidad=parseInt($('#temp_cantidad').val());
        precio_venta=$('#temp_precio_venta').val();
        descuento=$('#temp_descuento').val();
        stock=parseInt($('#temp_stock').val());

        if(idarticulo!='' && articulo_name!='' && cantidad!='' && cantidad>0 && descuento!=''  && precio_venta!='')
        {
          if(cantidad<=stock)
          {
            subtotal[cont]=cantidad*precio_venta-descuento;
            total=total+subtotal[cont];
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
              ${descripcion}
              </td>
              <td>
                <input type="hidden" name="cantidad[]"  value="${cantidad}">
                ${cantidad}
              </td>
              <td>
                <input type="hidden" name="precio_venta[]" value="${precio_venta}">
                S/.${precio_venta}
              </td>
              <td>
                <input type="hidden" name="descuento[]" value="${descuento}">
                ${descuento}
              </td>
              <td>S/.${subtotal[cont]}</td>
            </tr>
          `;
            cont++;
            limpiar();
            $('#total').html('S/.'+total);
            $('.total_venta').val(total);
            evaluar();
            $('#contenido').append(fila);
          }
          else
          {
            alert('Cantidad sobrepasa al stock'+idarticulo+'/'+articulo_name+'/'+cantidad+'/'+stock+'/'+precio_venta);
          }

        }
        else
        {
          alert('Errores al añadir los detalles, revise por favor!'+idarticulo+'/'+articulo_name+'/'+cantidad+'/'+stock+'/'+precio_venta)
        }
      }
      function limpiar()
      {
        $('#temp_cantidad').val('');
        $('#temp_descuento').val('');
        //$('#temp_precio_venta').val('');
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