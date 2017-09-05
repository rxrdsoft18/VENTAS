<?php

namespace sisventas\Http\Controllers;

use Illuminate\Http\Request;
use sisventas\Persona;
use Illuminate\Support\Facades\Redirect;
use sisventas\Http\Requests\PersonaFormRequest;
use DB;

class ProveedorController extends Controller
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
      $proveedores=DB::table('persona')
        ->where('tipo_persona','=','Proveedor')
        ->where('nombre','LIKE','%'.$query.'%')
        ->orwhere('tipo_persona','=','Proveedor')
        ->where('numero_documento','LIKE','%'.$query.'%')
        ->orderBy('idpersona','desc')
        ->paginate(7);
      
      return view('compras.proveedor.index',['proveedores'=>$proveedores,'buscarTexto'=>$query]);
        
    }
  }
  
  public function create()
  {
    return view('compras.proveedor.create');
  }
  
  public function store(PersonaFormRequest $request)
  {
    $proveedor=new Persona();
    $proveedor->tipo_persona='Proveedor';
    $proveedor->nombre=$request->get('nombre');
    $proveedor->tipo_documento=$request->get('tipo_documento');
    $proveedor->numero_documento=$request->get('numero_documento');
    $proveedor->direccion=$request->get('direccion');
    $proveedor->telefono=$request->get('telefono');
    $proveedor->email=$request->get('email');
    
    $proveedor->save();
    
    return Redirect::to('compras/proveedor');
  }
  
  public function edit($id)
  {
    $proveedor=Persona::findOrFail($id);
    
    return view('compras.proveedor.edit',['proveedor'=>$proveedor]);
  }
  
  public function update(PersonaFormRequest $request,$id)
  {
    $proveedor=Persona::findOrFail($id);
    $proveedor->nombre=$request->get('nombre');
    $proveedor->tipo_documento=$request->get('tipo_documento');
    $proveedor->numero_documento=$request->get('numero_documento');
    $proveedor->direccion=$request->get('direccion');
    $proveedor->telefono=$request->get('telefono');
    $proveedor->email=$request->get('email');
  
    $proveedor->update();
  
    return Redirect::to('compras/proveedor');
  }
  
  public function destroy($id)
  {
    $proveedor=Persona::findOrFail($id);
    $proveedor->tipo_persona='Inactivo';
    $proveedor->update();
    return Redirect::to('compras/proveedor');
  }
}
