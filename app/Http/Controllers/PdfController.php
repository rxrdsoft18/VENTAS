<?php

namespace sisventas\Http\Controllers;

use Illuminate\Http\Request;
use sisventas\Articulo;
use Excel;
use DB;

class PdfController extends Controller
{
  
  
  public function PDF_Articulos()
  {
    $articulos=DB::table('articulo as a')
      ->join('categoria as c','a.idcategoria','=','c.idcategoria')
      ->select('a.codigo','a.nombre','a.descripcion','a.stock','c.nombre as categoria','a.estado')
      ->get();
    $date = date('Y-m-d H:i:s');
    $view =  \View::make('pdf.all_articulos', compact('articulos', 'date'))->render();
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($view);
  
    return $pdf->stream('all_articulos');
  }
  
  public function Excel_Articulos()
  {
    return Excel::create('Tabla de Articulos', function($excel) {
  
      $excel->sheet('Articulos', function($sheet) {
        $articulos=DB::table('articulo as a')
          ->join('categoria as c','a.idcategoria','=','c.idcategoria')
          ->select('a.codigo','a.nombre','a.descripcion','a.stock','c.nombre as categoria','a.estado')
          ->get();
        $sheet->loadView('excel.export_articulos',['articulos'=>$articulos]);
    
      });
    })->export('xls');
  }
  
  public function PDF_Clientes()
  {
    $clientes=DB::table('persona')
      ->where('tipo_persona','=','Cliente')
      ->get();
    $date = date('Y-m-d H:i:s');
    $view =  \View::make('pdf.all_clientes', compact('clientes', 'date'))->render();
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($view);
  
    return $pdf->stream('all_clientes');
  }
  
  public function Excel_Clientes()
  {
    return Excel::create('Tabla de Clientes', function($excel) {
      
      $excel->sheet('Clientes', function($sheet) {
        $clientes=DB::table('persona')
          ->where('tipo_persona','=','Cliente')
          ->get();
        $sheet->loadView('excel.export_clientes',['clientes'=>$clientes]);
        
      });
    })->export('xls');
  }
  
  public function PDF_Venta($id)
  {
    $venta=DB::table('venta as v')
      ->join('persona as p','v.idcliente','=','p.idpersona')
      ->select('p.nombre','p.tipo_documento','p.numero_documento','p.direccion','v.tipo_comprobante','v.serie_comprobante','num_comprobante','v.fecha_hora',
        'v.impuesto','v.total_venta','v.estado')
      ->where('idventa','=',$id)
      ->first();
  
    $detalles=DB::table('detalle_venta as dv')
      ->join('articulo as a','dv.idarticulo','=','a.idarticulo')
      ->select('a.nombre','a.descripcion','a.codigo','dv.cantidad','dv.precio_venta','dv.descuento')
      ->where('dv.idventa','=',$id)
      ->get();
  
    $date = date('Y-m-d H:i:s');
    $view =  \View::make('pdf.venta', compact('venta','detalles', 'date'))->render();
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($view);
  
    return $pdf->stream('venta');
  }
  
  
  public function PDF_Proveedores()
  {
    $proveedores=DB::table('persona')
      ->where('tipo_persona','=','Proveedor')
      ->get();
    $date = date('Y-m-d H:i:s');
    $view =  \View::make('pdf.all_proveedores', compact('proveedores', 'date'))->render();
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($view);
    
    return $pdf->stream('all_proveedores');
  }
  
  public function Excel_Proveedores()
  {
    return Excel::create('Tabla de Proveedores', function($excel) {
      
      $excel->sheet('Proveedores', function($sheet) {
        $proveedores=DB::table('persona')
          ->where('tipo_persona','=','Proveedor')
          ->get();
        $sheet->loadView('excel.export_proveedores',['proveedores'=>$proveedores]);
        
      });
    })->export('xls');
  }
  
  public function PDF_Ventas()
  {
    $ventas=DB::table('venta as v')
      ->join('persona as p','v.idcliente','=','p.idpersona')
      ->select('p.nombre as cliente','v.idventa','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.fecha_hora',
        'v.impuesto','v.total_venta','v.estado')
      ->get();
    $date = date('Y-m-d H:i:s');
    $view =  \View::make('pdf.all_ventas', compact('ventas', 'date'))->render();
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($view);
    
    return $pdf->stream('all_ventas');
  }
  
  public function Excel_Ventas()
  {
    return Excel::create('Tabla de Ventas', function($excel) {
      
      $excel->sheet('Ventas', function($sheet) {
        $ventas=DB::table('venta as v')
          ->join('persona as p','v.idcliente','=','p.idpersona')
          ->select('p.nombre as cliente','v.idventa','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.fecha_hora',
            'v.impuesto','v.total_venta','v.estado')
          ->get();
        $sheet->loadView('excel.export_ventas',['ventas'=>$ventas]);
        
      });
    })->export('xls');
  }
  public function PDF_Ingresos()
  {
    $ingresos=DB::table('ingreso as i')
      ->join('persona as p','i.idproveedor','=','p.idpersona')
      ->join('detalle_ingreso as d','i.idingreso','=','d.idingreso')
      ->select('i.idingreso','p.nombre as proveedor','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.fecha_hora','i.impuesto','i.estado',DB::raw('sum(d.cantidad*precio_compra) as total'))
      ->where('p.tipo_persona','=','Proveedor')
      ->groupBy('i.idingreso','p.nombre','i.tipo_comprobante','i.serie_comprobante',
        'i.num_comprobante','i.fecha_hora','i.impuesto','i.estado')
      ->get();
    $date = date('Y-m-d H:i:s');
    $view =  \View::make('pdf.all_ingresos', compact('ingresos', 'date'))->render();
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($view);
    
    return $pdf->stream('all_ingresos');
  }
  
  public function Excel_Ingresos()
  {
    return Excel::create('Tabla de Ingresos', function($excel) {
      
      $excel->sheet('Ventas', function($sheet) {
        $ingresos=DB::table('ingreso as i')
          ->join('persona as p','i.idproveedor','=','p.idpersona')
          ->select('i.idingreso','p.nombre as proveedor','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.fecha_hora','i.impuesto','i.estado')
          ->get();
        $sheet->loadView('excel.export_ingresos',['ingresos'=>$ingresos]);
        
      });
    })->export('xls');
  }
  
  public function PDF_Ingreso($id)
  {
    $ingreso=DB::table('ingreso as i')
      ->join('persona as p','i.idproveedor','=','p.idpersona')
      ->join('detalle_ingreso as d','i.idingreso','=','d.idingreso')
      ->select('p.nombre as proveedor','i.tipo_comprobante','i.serie_comprobante',
        'i.num_comprobante','i.fecha_hora','i.impuesto','i.estado',DB::raw('sum(d.cantidad*precio_compra) as total'))
      ->where('i.idingreso','=',$id)
      ->groupBy('p.nombre','i.tipo_comprobante','i.serie_comprobante',
        'i.num_comprobante','i.fecha_hora','i.impuesto','i.estado')
      ->first();
  
    $detalles=DB::table('detalle_ingreso as di')
      ->join('articulo as a','di.idarticulo','=','a.idarticulo')
      ->select('di.cantidad','di.precio_compra','di.precio_venta','a.nombre','a.codigo')
      ->where('di.idingreso','=',$id)
      ->get();
    
    $date = date('Y-m-d H:i:s');
    $view =  \View::make('pdf.ingreso', compact('ingreso','detalles', 'date'))->render();
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($view);
    
    return $pdf->stream('ingreso');
  }
}
