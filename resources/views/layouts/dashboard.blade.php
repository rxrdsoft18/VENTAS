<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <!-- <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="../assets/img/favicon.png" /> -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>SISTEMA VENTAS</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />


  <!-- Bootstrap core CSS     -->
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />

  <!--  Material Dashboard CSS    -->
  <link href="{{asset('css/material-dashboard.css')}}" rel="stylesheet"/>

  <!--  CSS for Demo Purpose, don't include it in your project     -->
  <link href="{{asset('css/demo.css')}}" rel="stylesheet" />

  <!--     Fonts and icons     -->
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" href="{{asset('img/logo-ico.ico')}}">
</head>
<style>

  .aside-subnivel{
    position: relative;
    float: none;
    margin-left: 15px;
    margin-right: 15px;
  }
  .flecha{
    margin-top: 12px;
  }
  .pagination>.active>span,.pagination>li>a,.pagination>.disabled>span{
    border-radius: 20px;
  }
  .pagination>li:first-child>span,.pagination>li:last-child>a,.pagination>li:first-child>a,.pagination>li:last-child>span{
    border-radius: 20px;
  }
  .pagination>.active>span,.pagination>.active>span:hover{
    background-color: #ff9800;
    border-color: #ff9800;
  }
</style>
<body>

<div class="wrapper">

  <div class="sidebar" data-color="red" data-image="{{asset('img/sidebar-1.jpg')}}">
    <!--
          Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

          Tip 2: you can also add an image using data-image tag
      -->

    <div class="logo" style="padding: 10px 0px 0px 3px">
      <a href="#" class="simple-text">
        <img src="{{asset('img/logo.png')}}" alt="" width="80px" height="55px">
      </a>
    </div>

    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="{{ Request::path() == 'home' ? 'active' : '' }}">
          <a href="{{url('/home')}}" class="active">
            <i class="material-icons">home</i>
            <p>Inicio</p>
          </a>
        </li>
        <li class="dropdown {{ Request::is('almacen*') ? 'active' : '' }}">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="material-icons">business</i>
            <p>Almacen<b class="caret pull-right flecha"></b></p>
          </a>
          <ul class="dropdown-menu aside-subnivel" role="menu">
            <li><a href="{{url('almacen/articulo')}}" style="margin-top: 5px; margin-bottom: 0px"><p><i class="material-icons">label_outline</i>Articulo</p></a></li>
            <li><a href="{{url('almacen/categoria')}}" style="margin-top: 0px; margin-bottom: 5px"><p><i class="material-icons">label_outline</i>Categoria</p></a></li>
          </ul>
        </li>
        <li class="dropdown {{ Request::is('ventas*') ? 'active' : '' }}">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="material-icons">attach_money</i>
            <p>Ventas <b class="caret pull-right flecha"></b></p>
          </a>
          <ul class="dropdown-menu aside-subnivel" role="menu">
            <li><a href="{{url('ventas/cliente')}}" style="margin-top: 5px; margin-bottom: 0px"><p><i class="material-icons">label_outline</i>Cliente</p></a></li>
            <li><a href="{{url('ventas/venta')}}" style="margin-top: 0px; margin-bottom: 5px"><p><i class="material-icons">label_outline</i>Venta</p></a></li>
          </ul>
        </li>
        <li class="dropdown {{ Request::is('compras*') ? 'active' : '' }}">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="material-icons">shopping_cart</i>
            <p>Compras <b class="caret pull-right flecha"></b></p>
          </a>
          <ul class="dropdown-menu aside-subnivel" role="menu">
            <li><a href="{{url('compras/proveedor')}}" style="margin-top: 5px; margin-bottom: 0px"><p><i class="material-icons">label_outline</i>Proveedor</p></a></li>
            <li><a href="{{url('compras/ingreso')}}" style="margin-top: 0px; margin-bottom: 5px"><p><i class="material-icons">label_outline</i>Ingreso</p></a></li>
          </ul>
        </li>
        <li class="dropdown {{ Request::is('seguridad*') ? 'active' : '' }}">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="material-icons">accessibility</i>
            <p>Seguridad <b class="caret pull-right flecha"></b></p>
          </a>
          <ul class="dropdown-menu aside-subnivel">
            <li><a href="{{url('seguridad/usuario')}}"><p><i class="material-icons">label_outline</i>Usuarios</p></a></li>
          </ul>
        </li>
        <li class="{{ Request::path() == 'ubicacion' ? 'active' : '' }}">
          <a href="{{url('ubicacion')}}">
            <i class="material-icons">location_on</i>
            <p>Mapa</p>
          </a>
        </li>
      </ul>
    </div>
  </div>

  <div class="main-panel">
    <nav class="navbar navbar-transparent navbar-absolute">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Sistema de ventas</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="material-icons">notifications</i>
                <span class="notification">5</span>
                <p class="hidden-lg hidden-md">Notifications</p>
              </a>
              <ul class="dropdown-menu">
                <li><a href="#">Mike John responded to your email</a></li>
                <li><a href="#">You have 5 new tasks</a></li>
                <li><a href="#">You're now friend with Andrew</a></li>
                <li><a href="#">Another Notification</a></li>
                <li><a href="#">Another One</a></li>
              </ul>
            </li>
            <li>
              <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                <i class="material-icons">person</i>
                <p class="hidden-lg hidden-md">{{Auth::user()->name}}</p>
              </a>
              <ul class="dropdown-menu">
                <li>

                  <a href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                    Cerrar Sesion
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </li>
              </ul>
            </li>
          </ul>

        </div>
      </div>
    </nav>

    <div class="content">
      @yield('contenido')
    </div>

    <!--<footer class="footer" style="padding: 0px">
      <div class="container-fluid">
        <nav class="pull-left">
          <ul>
            <li>
              <a href="#">
                Facebook
              </a>
            </li>
            <li>
              <a href="#">
                Contacto
              </a>
            </li>
            <li>
              <a href="#">
                Portfolio
              </a>
            </li>
            <li>
              <a href="#">
                 Blog
              </a>
            </li>
          </ul>
        </nav>
        <p class="copyright pull-right">
          &copy; <script>document.write(new Date().getFullYear())</script> <a href="#"></a>
        </p>
      </div>
    </footer>-->
  </div>
</div>
<!--   Core JS Files   -->
<script src="{{asset('js/jquery-3.1.0.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/material.min.js')}}" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="{{asset('js/chartist.min.js')}}"></script>


<!--  Notifications Plugin    -->
<script src="{{asset('js/bootstrap-notify.js')}}"></script>


<!-- Material Dashboard javascript methods -->
<script src="{{asset('js/material-dashboard.js')}}"></script>

<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('js/demo.js')}}"></script>
@stack('detalleIngreso')

<script>
  $(document).ready(function(){
      $('.sidebar-wrapper li').on('click',function(){
        $('li.active').removeClass('active');
        $(this).addClass('active');
        $('.dropdown-menu li a').css({
          'background-color':'#ffffff',
          'box-shadow':'none'
        })

      });
  })
</script>

</body>
</html>
