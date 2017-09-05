<?php

namespace sisventas\Http\Controllers;

use Illuminate\Http\Request;
use sisventas\Venta;
use sisventas\DetalleVenta;
use Illuminate\Support\Facades\Redirect;
use sisventas\Http\Requests\VentaFormRequest;
use DB;


use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class VentaController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
      if ($request)
      {
        $query=trim($request->get('buscarTexto'));
        $ventas=DB::table('venta as v')
          ->join('persona as p','v.idcliente','=','p.idpersona')
          ->select('p.nombre as cliente','v.idventa','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.fecha_hora',
                  'v.impuesto','v.total_venta','v.estado')
          ->where('v.num_comprobante','LIKE','%'.$query.'%')
          ->orderBy('idventa','desc')
          ->paginate(7);
        
        return view('ventas.venta.index',['ventas'=>$ventas,'buscarTexto'=>$query]);
      }
    }
    
    public function create()
    {
      $clientes=DB::table('persona')->where('tipo_persona','=','Cliente')->get();
      $articulos=DB::table('articulo as a')
        ->join('detalle_ingreso as di','a.idarticulo','=','di.idarticulo')
        ->select('a.idarticulo','a.nombre','a.descripcion','a.stock',DB::raw('avg(di.precio_venta) as precio_venta'))
        ->where('a.estado','=','Activo')
        ->where('a.stock','>','0')
        ->groupBy('a.idarticulo','a.nombre','a.descripcion','a.stock')
        ->get();
      return view('ventas.venta.create',['clientes'=>$clientes,'articulos'=>$articulos]);
    }
    
    public function store(VentaFormRequest $request)
    {
      try
      {
        DB::beginTransaction();
          $venta=new Venta();
          $venta->idcliente=$request->get('idcliente');
          $venta->tipo_comprobante=$request->get('tipo_comprobante');
          $venta->serie_comprobante=$request->get('serie_comprobante');
          $venta->num_comprobante=$request->get('num_comprobante');
          $hora=Carbon::now('America/Lima');
          $venta->fecha_hora=$hora->toDateTimeString();
          $venta->impuesto='18';
          $venta->total_venta=$request->get('total_venta');
          $venta->estado='A';
          $venta->save();
          
          
          $idarticulo=$request->get('idarticulo');
          $cantidad=$request->get('cantidad');
          $precio_venta=$request->get('precio_venta');
          $descuento=$request->get('descuento');
          
          $cont=0;
          while ($cont<count($idarticulo))
          {
            $detallesVenta=new DetalleVenta();
            $detallesVenta->idventa=$venta->idventa;
            $detallesVenta->idarticulo=$idarticulo[$cont];
            $detallesVenta->cantidad=$cantidad[$cont];
            $detallesVenta->precio_venta=$precio_venta[$cont];
            $detallesVenta->descuento=$descuento[$cont];
            $detallesVenta->save();
            $cont++;
          }
        DB::commit();
      }
      catch (\Exception $exception)
      {
        DB::rollback();
      }
      
      return Redirect::to('ventas/venta');
    }
    
    public function show($id)
    {
      $venta=DB::table('venta as v')
        ->join('persona as p','v.idcliente','=','p.idpersona')
        ->select('p.nombre','v.tipo_comprobante','v.serie_comprobante','num_comprobante','v.fecha_hora',
          'v.impuesto','v.total_venta','v.estado')
        ->where('idventa','=',$id)
        ->first();
      
      $detalles=DB::table('detalle_venta as dv')
        ->join('articulo as a','dv.idarticulo','=','a.idarticulo')
        ->select('a.nombre','a.descripcion','dv.cantidad','dv.precio_venta','dv.descuento')
        ->where('dv.idventa','=',$id)
        ->get();
      
      
      return view('ventas.venta.show',['venta'=>$venta,'detalles'=>$detalles,'idventa'=>$id]);
    }
}
