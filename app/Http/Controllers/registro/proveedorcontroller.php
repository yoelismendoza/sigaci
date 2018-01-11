<?php

namespace sigaci\Http\Controllers\registro;

use Illuminate\Http\Request;

use sigaci\Http\Requests;
use sigaci\Http\Controllers\Controller;
use sigaci\proveedor;
use Laracasts\Flash\Flash;
use sigaci\Http\Requests\proveedorrequest;


class proveedorcontroller extends Controller
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
        if($rif=='' and $nombre=='') $proveedor = proveedor::orderBy('id', 'ASC')->paginate(8);
        if($rif!='' and $nombre=='') $proveedor = proveedor::rif($request->get("rif"))->orderBy('id','DESC')->paginate(8);
        if($rif=='' and $nombre!='') $proveedor = proveedor::nombre($request->get("nombre"))->orderBy('id','DESC')->paginate(8);    
        if($rif!='' and $nombre!='') $proveedor = proveedor::rifnombre($request->get("rif"),$request->get("nombre"))->orderBy('id','DESC')->paginate(8);    
        return view('registro.proveedor.index')->with('proveedor', $proveedor);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('registro.proveedor.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $proveedor = new proveedor($request->all());
          $proveedor->created_at = date('Y-m-d');
        $proveedor->updated_at = date('Y-m-d');
        $rif               = strtoupper($proveedor->rif);
        $nombre            = strtoupper($proveedor->nombre);
        $direccion         = strtoupper($proveedor->direccion);
        $proveedor->rif = $rif;
        $proveedor->nombre = $nombre;
        $proveedor->direccion = $direccion;
        $proveedor->save();

        Flash::success('Se ha registrado de manera exitosa!');
    
               //Flash::success('Se ha registrado de manera exitosa!');
        return redirect('/proveedor')->with('message','store');
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
         $proveedor = proveedor::find($id);
      return view('registro.proveedor.show',compact('proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $proveedor = proveedor::find($id);
      return view('registro.proveedor.edit',compact('proveedor'));
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
        $proveedor = proveedor::find($id);
        $proveedor->fill($request->all());
        $rif               = strtoupper($proveedor->rif);
        $nombre            = strtoupper($proveedor->nombre);
        $direccion         = strtoupper($proveedor->direccion);
        $proveedor->rif = $rif;
        $proveedor->nombre = $nombre;
        $proveedor->direccion = $direccion;
        $proveedor->save();
        Flash::success('Se ha actualizado de manera exitosa!');
        return redirect('/proveedor')->with('message','store');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $proveedor= proveedor::find($id);
        $proveedor->destroy($id);
        Flash::success('Se ha eliminado el registro de manera exitosa!');
        $proveedor = proveedor::orderBy('id', 'ASC')->paginate(6);
        return view('registro.proveedor.index')->with('proveedor', $proveedor);
    }
}
