<?php

namespace sisventas\Http\Controllers;

use Illuminate\Http\Request;
use sisventas\Persona;
use Illuminate\Support\Facades\Redirect;
use sisventas\Http\Requests\PersonaFormRequest;
use DB;

class ClienteController extends Controller
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
      $clientes=DB::table('persona')
        ->where('tipo_persona','=','Cliente')
        ->where('nombre','LIKE','%'.$query.'%')
        ->orderBy('idpersona','desc')
        ->paginate(7);
      return view('ventas.cliente.index',['clientes'=>$clientes,'buscarTexto'=>$query]);
    }
  }
  public function create()
  {
    return view('ventas.cliente.create');
  }
  
  public function store(PersonaFormRequest $request)
  {
    $cliente=new Persona();
    $cliente->tipo_persona='Cliente';
    $cliente->nombre=$request->get('nombre');
    $cliente->tipo_documento=$request->get('tipo_documento');
    $cliente->numero_documento=$request->get('numero_documento');
    $cliente->direccion=$request->get('direccion');
    $cliente->telefono=$request->get('telefono');
    $cliente->email=$request->get('email');
    
    $cliente->save();
    
    return Redirect::to('ventas/cliente');
  }
  public function show($id)
  {
    return view('ventas.cliente.show');
  }
  
  public function edit($id)
  {
    //$cliente=Persona::findOrFail($id);
    return view('ventas.cliente.edit',['cliente'=>Persona::findOrFail($id)]);
  }
  
  public function update(PersonaFormRequest $request,$id)
  {
    $cliente=Persona::findOrFail($id);
    $cliente->nombre=$request->get('nombre');
    $cliente->tipo_documento=$request->get('tipo_documento');
    $cliente->numero_documento=$request->get('numero_documento');
    $cliente->direccion=$request->get('direccion');
    $cliente->telefono=$request->get('telefono');
    $cliente->email=$request->get('email');
  
    $cliente->update();
    
    return Redirect::to('ventas/cliente');
  }
  
  public function destroy($id)
  {
    $cliente=Persona::findOrFail($id);
    $cliente->tipo_persona='Inactivo';
    $cliente->update();
    
    return Redirect::to('ventas/cliente');
  }
}
