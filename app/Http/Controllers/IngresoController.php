<?php

namespace sisventas\Http\Controllers;

use Illuminate\Http\Request;
use sisventas\Ingreso;
use Illuminate\Support\Facades\Redirect;
use sisventas\Http\Requests\IngresoFormRequest;
use sisventas\DetalleIngreso;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class IngresoController extends Controller
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
      $ingresos=DB::table('ingreso as i')
        ->join('persona as p','i.idproveedor','=','p.idpersona')
        ->select('i.idingreso','p.nombre as proveedor','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.fecha_hora','i.impuesto','i.estado')
        ->where('i.num_comprobante','LIKE','%'.$query.'%')
        ->orderBy('idingreso','desc')
        ->paginate(7);
      return view('compras.ingreso.index',['ingresos'=>$ingresos,'buscarTexto'=>$query]);
    }
  }
  
  public function create()
  {
    $proveedores=DB::table('persona')->where('tipo_persona','=','Proveedor')->get();
    $articulos=DB::table('articulo')->where('estado','=','Activo')->get();
    
    return view('compras.ingreso.create',['proveedores'=>$proveedores,'articulos'=>$articulos]);
    
  }
  
  public function store(IngresoFormRequest $request)
  {
    try
    {
      DB::beginTransaction();
      
      $ingreso=new Ingreso();
      $ingreso->idproveedor=$request->get('idproveedor');
      $ingreso->tipo_comprobante=$request->get('tipo_comprobante');
      $ingreso->serie_comprobante=$request->get('serie_comprobante');
      $ingreso->num_comprobante=$request->get('num_comprobante');
      
      $hora=Carbon::now('America/Lima');
      $ingreso->fecha_hora=$hora->toDateTimeString();
      $ingreso->impuesto='18';
      $ingreso->estado='A';
      $ingreso->save();
      
      $idarticulo=$request->get('idarticulo');
      $cantidad=$request->get('cantidad');
      $precio_compra=$request->get('precio_compra');
      $precio_venta=$request->get('precio_venta');
      
      $cont=0;
      
      while ($cont<count($idarticulo))
      {
        $detallesIngreso=new DetalleIngreso();
        $detallesIngreso->idingreso=$ingreso->idingreso;
        $detallesIngreso->idarticulo=$idarticulo[$cont];
        $detallesIngreso->cantidad=$cantidad[$cont];
        $detallesIngreso->precio_compra=$precio_compra[$cont];
        $detallesIngreso->precio_venta=$precio_venta[$cont];
        $detallesIngreso->save();
        $cont++;
      }
      DB::commit();
    }
    catch (\Exception $e)
    {
      DB::rollback();
      //dd($e);
    }
    
    return Redirect::to('compras/ingreso');
  }
  
  public function show($id)
  {
    $ingreso=DB::table('ingreso as i')
      ->join('persona as p','i.idproveedor','=','p.idpersona')
      ->join('detalle_ingreso as d','i.idingreso','=','d.idingreso')
      ->select('i.idingreso','p.nombre as proveedor','i.tipo_comprobante','i.serie_comprobante',
               'i.num_comprobante','i.fecha_hora','i.impuesto','i.estado',DB::raw('sum(d.cantidad*precio_compra) as total'))
      ->where('i.idingreso','=',$id)
      ->groupBy('i.idingreso','p.nombre','i.tipo_comprobante','i.serie_comprobante',
        'i.num_comprobante','i.fecha_hora','i.impuesto','i.estado')
      ->first();
    
    $detalle=DB::table('detalle_ingreso as di')
      ->join('articulo as a','di.idarticulo','=','a.idarticulo')
      ->select('di.cantidad','di.precio_compra','di.precio_venta','a.nombre','a.codigo')
      ->where('di.idingreso','=',$id)
      ->get();
      //->groupBy('di.cantidad','di.precio_compra','di.precio_venta','a.nombre','a.codigo')
     
    return view('compras.ingreso.show',['ingreso'=>$ingreso,'detalle'=>$detalle]);
  }
  
  
  
  public function edit($id)
  {
    $ingreso=Ingreso::findOrFail($id);
    return view('compras.ingreso.edit',['ingreso'=>$ingreso]);
  }
}
