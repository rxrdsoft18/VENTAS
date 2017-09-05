<html>
<head>
  <style>
    body{
      font-family: sans-serif;
    }
    @page {
      margin: 160px 50px;
    }
    header { position: fixed;
      left: 0px;
      top: -160px;
      right: 0px;
      height: 100px;
      background-color: #ddd;
      text-align: center;
    }
    header h1{
      margin: 10px 0;
    }
    header h2{
      margin: 0 0 10px 0;
    }
    footer {
      position: fixed;
      left: 0px;
      bottom: -100px;
      right: 0px;
      height: 40px;
      border-bottom: 2px solid #ddd;
    }
    footer .page:after {
      content: counter(page);
    }
    footer table {
      width: 100%;
    }
    footer p {
      text-align: right;
    }
    footer .izq {
      text-align: left;
    }

    .col-md-12 {
      width: 100%;
    }

    .table-bordered {
      border: 1px solid #f4f4f4;
    }

    .table {
      width: 100%;
      max-width: 100%;
      margin-bottom: 20px;
    }

    table {
      background-color: transparent;
    }

    .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
      border: 1px solid #f4f4f4;
    }

    .data-center{
      text-align: center;
    }

    /*Estilo cebra tabla*/

    table tr {
      background-color: #eee;
    }
    table tr:nth-child(even) {
      background-color: #eee;
    }

    table tr:nth-child(odd) {
      background-color: #fff;
    }

    .form-group{
      margin-bottom: 15px;
    }

    .detalles{
      list-style: none;
      text-align: right;
      margin-left: 5px;
      padding-left: 0;
      font-size: 12px;
    }
    .info-empresa{
      width: 200px;
      text-align: left;
      margin-top: 3px;
      font-size: 16px;
      border: 1px black solid;
      font-weight: bold;
      /*padding: 5px 0px 0px 25px;*/
      border-radius: 20px;
    }
    .info-empresa p,.info-empresa h3,.info-empresa h4{
      text-align: center;
      padding-top: -15px;

    }
    .info-empresa p{
      padding-top: -18px;
    }
    .info-empresa h4{
      padding-top: -20px;
      padding-bottom: -15px;
    }
    .info-tienda{
      float: right;
    }
    .info-tienda h3{
      padding-top: -16px;
    }
    .info-tienda p{
      font-size: 15px;
    }
    .info-tienda h6{
      font-size: 12px;
      padding-top: -16px;
    }

    .info-cliente{
      border: 1px solid gray;
      border-radius: 5px;
      padding: 10px;
    }

  </style>

</head>
<body>
<div class="col-md-12">
  <header>
    <h2>@yield('title')</h2>
    <h4>@yield('impresion')</h4>
    <span>@yield('informacion')</span>

  </header>
  <footer>
    <table>
      <tr>
        <td>
          <p class="izq">VentaFast</p>
        </td>
        <td>
          <p class="page">Página</p>
        </td>
      </tr>
    </table>
  </footer>
  <div id="content">
    @yield('contenidoTabla')

    <!--<p style="page-break-before: always;">
      Podemos romper la página en cualquier momento...</p>
    </p>
    <p>
      Praesent pharetra enim sit amet...
    </p>-->
  </div>
</div>
</body>
</html>