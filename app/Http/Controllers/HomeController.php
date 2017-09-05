<?php

namespace sisventas\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;

use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if ($request)
      {
        $total_ingreso=DB::table('detalle_ingreso')
          ->select(DB::raw('sum(cantidad*precio_compra) as total'))
          ->first();
        //dd($total_ingreso->total);
        $total_producto=DB::table('articulo')
          ->select(DB::raw('sum(stock) as total'))
          ->first();
        
        $total_caja=DB::table('venta')
          ->select(DB::raw('sum(total_venta) as total_caja'))
          ->first();
        //dd($total_caja->total_caja);
        
        $productos_new=DB::table('articulo as a')
          ->join('detalle_ingreso as di','a.idarticulo','=','di.idarticulo')
          ->select('a.nombre','di.idingreso','di.cantidad','di.precio_compra')
          ->orderBy('di.iddetalle_ingreso','desc')
          ->take(4)
          ->get();
        //dd($prodcutos_new);
        
        $ventas_latest=DB::table('venta as v')
          ->join('detalle_venta as dv','v.idventa','=','dv.idventa')
          ->join('articulo as a','dv.idarticulo','=','a.idarticulo')
          ->select('dv.iddetalle_venta','a.nombre','dv.cantidad','dv.precio_venta')
          ->orderBy('dv.iddetalle_venta','desc')
          ->take(4)
          ->get();
        //dd($ventas_latest);
        
        $venta_now=DB::table('venta')
          ->select(DB::raw('sum(total_venta) as total_hoy '))
          ->whereDay('fecha_hora',Carbon::now()->day)
          ->first();
        //dd($venta_now->total_hoy);
        
        $compras_month=DB::table('ingreso as i')
          ->join('detalle_ingreso as di','i.idingreso','=','di.idingreso')
          ->select(DB::raw('YEAR(fecha_hora), MONTH(fecha_hora),count(*),sum(di.cantidad*precio_compra) as total_month'))
          ->groupBy(DB::raw('MONTH(fecha_hora),YEAR(fecha_hora)'))
          ->get();
        
       // dd($compras_month);
        $ventas_month=DB::table('venta')
          ->select(DB::raw('YEAR(fecha_hora), MONTH(fecha_hora),sum(total_venta) as total_venta'))
          ->groupBy(DB::raw('MONTH(fecha_hora),YEAR(fecha_hora)'))
          ->get();
        //dd($ventas_month);
        
      }
        return view('home',['total_ingreso'=>$total_ingreso,
                         'total_producto'=>$total_producto,
                        'total_caja'=>$total_caja,
                        'productos_new'=>$productos_new,
                        'ventas_latest'=>$ventas_latest,
                        'venta_now'=>$venta_now,
                        'total_month'=>$compras_month,
                        'ventas_month'=>$ventas_month]);
    }
}
