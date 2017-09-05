<?php

namespace sisventas\Http\Controllers;

use Illuminate\Http\Request;
use sisventas\Articulo;
use Illuminate\Support\Facades\Redirect;
use sisventas\Http\Requests\ArticuloFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class ArticuloController extends Controller
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
        $articulos=DB::table('articulo as a')
          ->join('categoria as c','a.idcategoria','=','c.idcategoria')
          ->select('a.idarticulo','a.nombre','c.nombre as categoria','a.codigo','a.descripcion','a.stock','a.imagen','a.estado')
          ->where('a.nombre','LIKE','%'.$query.'%')
          ->orwhere('a.codigo','LIKE','%'.$query.'%')
          ->orderBy('a.idarticulo','desc')
          ->paginate(7);
        
        return view('almacen.articulo.index',['articulos'=>$articulos,'buscarTexto'=>$query]);
      }
      
    }

   
    public function create()
    {
        $categorias=DB::table('categoria')->where('condicion','=','1')->get();
        
        return view('almacen.articulo.create',['categorias'=>$categorias]);
    }

   
    public function store(ArticuloFormRequest $request)
    {
      //dd(public_path()."/imagenes/articulos/".$request->file('imagen')->getClientOriginalName());
      $articulo=new Articulo();
      $articulo->idcategoria=$request->get('idcategoria');
      $articulo->codigo=$request->get('codigo');
      $articulo->nombre=$request->get('nombre');
      $articulo->stock=$request->get('stock');
      $articulo->descripcion=$request->get('descripcion');
      $articulo->estado='Activo';
      if ($request->hasFile('imagen'))
      {
        if ($request->file('imagen')->isValid())
        {
          $file=$request->file('imagen');
          $name = time() . '.' . $file->getClientOriginalExtension();
          //dd($name);
          //$file->move(public_path()."/imagenes/articulos/".$file->getClientOriginalName());
          $file->move(public_path()."/imagenes/articulos/",$name);
          $articulo->imagen=$name;
        }
      }
      $articulo->save();
      
      return Redirect::to('almacen/articulo');
    }

    
    public function show($id)
    {
        return view('almacen.articulo.show');
    }

  
    public function edit($id)
    {
        $categorias=DB::table('categoria')->where('condicion','=','1')->get();
        $articulo=Articulo::findOrFail($id);
        
        return view('almacen.articulo.edit',['categorias'=>$categorias,'articulo'=>$articulo]);
    }

 
    public function update(Request $request, $id)
    {
      $articulo=Articulo::findOrFail($id);
      $articulo->idcategoria=$request->get('idcategoria');
      $articulo->codigo=$request->get('codigo');
      $articulo->nombre=$request->get('nombre');
      $articulo->stock=$request->get('stock');
      $articulo->descripcion=$request->get('descripcion');
      if ($request->hasFile('imagen'))
      {
        if ($request->file('imagen')->isValid())
        {
          $file=$request->file('imagen');
          $name = time() . '.' . $file->getClientOriginalExtension();
          //dd($name);
          //$file->move(public_path()."/imagenes/articulos/".$file->getClientOriginalName());
          $file->move(public_path()."/imagenes/articulos/",$name);
          $articulo->imagen=$name;
        }
      }
      $articulo->update();
  
      return Redirect::to('almacen/articulo');
    }

    
    public function destroy($id)
    {
        $articulo=Articulo::findOrFail($id);
        $articulo->estado='Inactivo';
        $articulo->update();
        
        return Redirect::to('almacen/articulo');
    }
}
