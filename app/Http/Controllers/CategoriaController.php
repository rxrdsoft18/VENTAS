<?php

namespace sisventas\Http\Controllers;

use Illuminate\Http\Request;
use sisventas\Categoria;
use Illuminate\Support\Facades\Redirect;
use sisventas\Http\Requests\CategoriaFormRequest;
use DB;

class CategoriaController extends Controller
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
        $categorias=DB::table('categoria')
          ->where('nombre','LIKE','%'.$query.'%')
          ->where('condicion','=','1')
          ->orderBy('idcategoria','desc')
          ->paginate(7);
        return view('almacen.categoria.index',['categorias'=>$categorias,'buscarTexto'=>$query]);
      }
      
    }
  
    public function create()
    {
        return view('almacen.categoria.create');
    }

  
    public function store(CategoriaFormRequest $request)
    {
      $categoria=new Categoria();
      $categoria->nombre=$request->get('nombre');
      $categoria->descripcion=$request->get('descripcion');
      $categoria->condicion='1';
      $categoria->save();
      
      return Redirect::to('almacen/categoria');
    }

   /* public function show($id)
    {
        return view('almacen.categoria.show');
    }
    
    */
    public function edit($id)
    {
      $categoria=Categoria::findOrFail($id);
      
      return view('almacen.categoria.edit',['categoria'=>$categoria]);
    }
  
    public function update(CategoriaFormRequest $request, $id)
    {
        $categoria=Categoria::findOrFail($id);
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');
        $categoria->update();
        
        return Redirect::to('almacen/categoria');
    }

    
    public function destroy($id)
    {
        $categoria=Categoria::findOrFail($id);
        $categoria->condicion='0';
        $categoria->update();
        
        return Redirect::to('almacen/categoria');
    }
}
