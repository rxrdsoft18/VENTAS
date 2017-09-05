@extends('layouts.dashboard')
@section('contenido')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                      <i class="material-icons">attach_money</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Ventas de hoy</p>
                        @if($venta_now->total_hoy!=null)
                        <h3 class="title">S/{{$venta_now->total_hoy}}</h3>
                        @else
                        <h3 class="title">S/0.00</h3>
                        @endif
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                          <i class="material-icons">attach_money</i> Total de hoy
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                      <i class="material-icons">shopping_basket</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Compras</p>
                        <h3 class="title">S/.{{$total_ingreso->total}}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">date_range</i> Gasto de ingreso
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="red">
                      <i class="material-icons">local_offer</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Productos</p>
                        <h3 class="title">{{$total_producto->total}}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">local_offer</i> total de productos
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="blue">
                      <i class="material-icons">local_atm</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Caja actual</p>
                        <h3 class="title">S/.{{$total_caja->total_caja}}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">update</i> total en caja
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
          <!--  <div class="col-md-4">
                <div class="card">
                    <div class="card-header card-chart" data-background-color="green">
                        <div class="ct-chart" id="dailySalesChart"></div>
                    </div>
                    <div class="card-content">
                        <h4 class="title">Ventas Diarias</h4>
                        <p class="category"><span class="text-success"><i class="fa fa-long-arrow-up"></i> 55%  </span> increase in today sales.</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">access_time</i> updated 4 minutes ago
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-chart" data-background-color="orange">
                        <div class="ct-chart" id="emailsSubscriptionChart"></div>
                    </div>
                    <div class="card-content">
                        <h4 class="title">Compras Mensuales</h4>
                        <p class="category">Gastos de ingresos mensuales</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">access_time</i> datos actualizados cada mes
                        </div>
                    </div>

                </div>
              <input type="hidden" id="objeto" value="{{$total_month}}">
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-chart" data-background-color="red">
                        <div class="ct-chart" id="completedTasksChart"></div>
                    </div>
                    <div class="card-content">
                        <h4 class="title">Ventas Mensuales</h4>
                        <p class="category">Todas la ventas </p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">access_time</i> datos actualizados cada mes
                        </div>
                    </div>
                </div>
              <input type="hidden" id="ventas_mes" value="{{$ventas_month}}">
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="blue">
                        <h4 class="title">Ultimas Ventas</h4>
                        <p class="category">ventas recientes</p>
                    </div>
                    <div class="card-content table-responsive">
                        <table class="table table-hover">
                            <thead class="text-info">
                            <th>ID</th>
                            <th>Articulo</th>
                            <th>Cantidad</th>
                            <th>Precio Venta</th>
                            </thead>
                            <tbody>
                            @foreach($ventas_latest as $vlast)
                              <tr>
                                <td>{{$vlast->iddetalle_venta}}</td>
                                <td>{{$vlast->nombre}}</td>
                                <td>{{$vlast->cantidad}}</td>
                                <td>{{$vlast->precio_venta}}</td>
                              </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="orange">
                        <h4 class="title">Productos Recientes</h4>
                        <p class="category">Productos agregados recientemente</p>
                    </div>
                    <div class="card-content table-responsive">
                        <table class="table table-hover">
                            <thead class="text-warning">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Precio Compra</th>
                            </thead>
                            <tbody>
                            @foreach($productos_new as $pnew)
                              <tr>
                                <td>{{$pnew->idingreso}}</td>
                                <td>{{$pnew->nombre}}</td>
                                <td>{{$pnew->cantidad}}</td>
                                <td>S/.{{$pnew->precio_compra}}</td>
                              </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@push('detalleIngreso')
  <script>
    var compras_mes=[5000,6000,6600,7800,4700,0,0,0,0,0,0,0];
    var ventas_mes=[3000,4000,5600,8800,6700,4520,5000.45,0,0,0,0,0]
    $(document).ready(function(){

      obj=$('#objeto').val();
      obj1=$('#ventas_mes').val();

      console.log(JSON.parse(obj));
      $.each(JSON.parse(obj),function(index,value){
        //alert(index+':'+value.total_month)
        compras_mes[5+index]=value.total_month;
      });
      $.each(JSON.parse(obj1),function(index,value){

        ventas_mes[7+index]=value.total_venta;
      });
    });



    demo = {
      initPickColor: function(){
        $('.pick-class-label').click(function(){
          var new_class = $(this).attr('new-class');
          var old_class = $('#display-buttons').attr('data-class');
          var display_div = $('#display-buttons');
          if(display_div.length) {
            var display_buttons = display_div.find('.btn');
            display_buttons.removeClass(old_class);
            display_buttons.addClass(new_class);
            display_div.attr('data-class', new_class);
          }
        });
      },

      initFormExtendedDatetimepickers: function(){
        $('.datetimepicker').datetimepicker({
          icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-chevron-up",
            down: "fa fa-chevron-down",
            previous: 'fa fa-chevron-left',
            next: 'fa fa-chevron-right',
            today: 'fa fa-screenshot',
            clear: 'fa fa-trash',
            close: 'fa fa-remove'
          }
        });
      },

      initDocumentationCharts: function(){
        /* ----------==========     Daily Sales Chart initialization For Documentation    ==========---------- */

        dataDailySalesChart = {
          labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
          series: [
            [12, 17, 7, 17, 23, 18, 38]
          ]
        };

        optionsDailySalesChart = {
          lineSmooth: Chartist.Interpolation.cardinal({
            tension: 0
          }),
          low: 0,
          high: 50, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
          chartPadding: { top: 0, right: 0, bottom: 0, left: 0},
        }

        var dailySalesChart = new Chartist.Line('#dailySalesChart', dataDailySalesChart, optionsDailySalesChart);

        md.startAnimationForLineChart(dailySalesChart);
      },

      initDashboardPageCharts: function(){

        /* ----------==========     Daily Sales Chart initialization    ==========---------- */
/*
        dataDailySalesChart = {
          labels: ['Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa', 'Do'],
          series: [
            [20, 17, 7, 17, 23, 18, 38]
          ]
        };

        optionsDailySalesChart = {
          lineSmooth: Chartist.Interpolation.cardinal({
            tension: 0
          }),
          low: 0,
          high: 50, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
          chartPadding: { top: 0, right: 0, bottom: 0, left: 0},
        }

        var dailySalesChart = new Chartist.Line('#dailySalesChart', dataDailySalesChart, optionsDailySalesChart);

        md.startAnimationForLineChart(dailySalesChart);*/



        /* ----------==========     Completed Tasks Chart initialization    ==========---------- */

        dataCompletedTasksChart = {
          labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago','Set','Oct','Nov','Dic'],
          series: [
            [ventas_mes[0], ventas_mes[1],ventas_mes[2],ventas_mes[3],ventas_mes[4],ventas_mes[5],ventas_mes[6],ventas_mes[7],ventas_mes[8],ventas_mes[9],ventas_mes[10],ventas_mes[11]]
          ]
        };

        optionsCompletedTasksChart = {
          lineSmooth: Chartist.Interpolation.cardinal({
            tension: 0
          }),
          low: 0,
          high: 10000, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
          chartPadding: { top: 0, right: 0, bottom: 0, left: 0}
        }

        var completedTasksChart = new Chartist.Line('#completedTasksChart', dataCompletedTasksChart, optionsCompletedTasksChart);

        // start animation for the Completed Tasks Chart - Line Chart
        md.startAnimationForLineChart(completedTasksChart);



        /* ----------==========     Emails Subscription Chart initialization    ==========---------- */

        var dataEmailsSubscriptionChart = {
          labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago','Set','Oct','Nov','Dic'],
          series: [
            [compras_mes[0], compras_mes[1], compras_mes[2], compras_mes[3], compras_mes[4], compras_mes[5], compras_mes[6], compras_mes[7], compras_mes[8], compras_mes[9], compras_mes[10], compras_mes[11]]

          ]
        };
        var optionsEmailsSubscriptionChart = {
          axisX: {
            showGrid: false
          },
          low: 0,
          high: 10000,
          chartPadding: { top: 0, right: 5, bottom: 0, left: 0}
        };
        var responsiveOptions = [
          ['screen and (max-width: 640px)', {
            seriesBarDistance: 5,
            axisX: {
              labelInterpolationFnc: function (value) {
                return value[0];
              }
            }
          }]
        ];
        var emailsSubscriptionChart = Chartist.Bar('#emailsSubscriptionChart', dataEmailsSubscriptionChart, optionsEmailsSubscriptionChart, responsiveOptions);

        //start animation for the Emails Subscription Chart
        md.startAnimationForBarChart(emailsSubscriptionChart);

      },

      initGoogleMaps: function(){
        var myLatlng = new google.maps.LatLng(40.748817, -73.985428);
        var mapOptions = {
          zoom: 13,
          center: myLatlng,
          scrollwheel: false, //we disable de scroll over the map, it is a really annoing when you scroll through page
          styles: [{"featureType":"water","stylers":[{"saturation":43},{"lightness":-11},{"hue":"#0088ff"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"hue":"#ff0000"},{"saturation":-100},{"lightness":99}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#808080"},{"lightness":54}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#ece2d9"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#ccdca1"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#767676"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#b8cb93"}]},{"featureType":"poi.park","stylers":[{"visibility":"on"}]},{"featureType":"poi.sports_complex","stylers":[{"visibility":"on"}]},{"featureType":"poi.medical","stylers":[{"visibility":"on"}]},{"featureType":"poi.business","stylers":[{"visibility":"simplified"}]}]

        }
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);

        var marker = new google.maps.Marker({
          position: myLatlng,
          title:"Hello World!"
        });

        // To add the marker to the map, call setMap();
        marker.setMap(map);
      },

      showNotification: function(from, align){
        color = Math.floor((Math.random() * 4) + 1);

        $.notify({
          icon: "notifications",
          message: "Welcome to <b>Material Dashboard</b> - a beautiful freebie for every web developer."

        },{
          type: type[color],
          timer: 4000,
          placement: {
            from: from,
            align: align
          }
        });
      }



    }
  </script>
  <script type="text/javascript">
    $(document).ready(function(){

      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();
    });
  </script>

@endpush
@endsection
