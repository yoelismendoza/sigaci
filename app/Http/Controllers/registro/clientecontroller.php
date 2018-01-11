<?php

namespace sigaci\Http\Controllers\registro;

use Illuminate\Http\Request;

use sigaci\Http\Requests;
use sigaci\Http\Controllers\Controller;
use sigaci\cliente;
use Laracasts\Flash\Flash;
use sigaci\Http\Requests\clienterequest;


class clientecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {
        session_start();
        $rif        = $request->rif;
        $nombre     = $request->nombre;
        $codigo     = $request->codigo;
        if($rif=='' and $nombre=='') $cliente = cliente::orderBy('id', 'ASC')->paginate(8);
        if($rif!='' and $nombre=='') $cliente = cliente::rif($request->get("rif"))->orderBy('id','DESC')->paginate(8);
        if($rif=='' and $nombre!='') $cliente = cliente::nombre($request->get("nombre"))->orderBy('id','DESC')->paginate(8);    
        if($rif!='' and $nombre!='') $cliente = cliente::rifnombre($request->get("rif"),$request->get("nombre"))->orderBy('id','DESC')->paginate(8);    
        return view('registro.clientes.index')->with('cliente', $cliente);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('registro.clientes.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(clienteRequest $request)
    {
        $cliente = new cliente($request->all());
        $cliente->created_at = date('Y-m-d');
        $cliente->updated_at = date('Y-m-d');
        $codigo               = strtoupper($cliente->codigo);
        $rif               = strtoupper($cliente->rif);
        $nombre            = strtoupper($cliente->nombre);
        $direccion         = strtoupper($cliente->direccion);
        $cliente->codigo = $codigo;
        $cliente->rif = $rif;
        $cliente->nombre = $nombre;
        $cliente->direccion = $direccion;
        $cliente->save();

        Flash::success('Se ha registrado de manera exitosa!');
    
               //Flash::success('Se ha registrado de manera exitosa!');
        return redirect('/cliente')->with('message','store');
  //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $cliente = cliente::find($id);
      return view('registro.clientes.show',compact('cliente'));
//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $cliente = cliente::find($id);
      return view('registro.clientes.edit',compact('cliente'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente = cliente::find($id);
        $cliente->fill($request->all());
        $rif               = strtoupper($cliente->rif);
        $nombre            = strtoupper($cliente->nombre);
        $direccion         = strtoupper($cliente->direccion);
        $cliente->rif = $rif;
        $cliente->nombre = $nombre;
        $cliente->direccion = $direccion;
        $cliente->save();
        Flash::success('Se ha actualizado de manera exitosa!');
        return redirect('/cliente')->with('message','store');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $cliente= cliente::find($id);
        $cliente->destroy($id);
        Flash::success('Se ha eliminado el registro de manera exitosa!');
        $cliente = cliente::orderBy('id', 'ASC')->paginate(6);
        return view('registro.clientes.index')->with('cliente', $cliente);
    }
}
