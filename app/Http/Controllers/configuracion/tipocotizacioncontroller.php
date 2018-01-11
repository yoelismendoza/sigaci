<?php

namespace sigaci\Http\Controllers\configuracion;

use Illuminate\Http\Request;

use sigaci\Http\Requests;
use sigaci\Http\Controllers\Controller;
use sigaci\tipocotizacion;

use Laracasts\Flash\Flash;
use sigaci\Http\Requests\tipocotizacionrequest;

class tipocotizacioncontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_start();
        $tipocotizacion = tipocotizacion::orderBy('id', 'ASC')->paginate(6);
        return view('configuracion.tipocotizacion.index')->with('tipocotizacion', $tipocotizacion);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //session_start();
        //$idusuario = $_SESSION['usuario'];
        //$tipoempresa = Tipoempresa::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');
        return view('configuracion.tipocotizacion.crear');
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(tipocotizacionrequest $request)
    {
                 //$tipoempresa = new tipoempresa;
        //$tipoempresa -> create($request->All());
        $tipocotizacion = new tipocotizacion($request->all());
        $tipocotizacion->created_at = date('Y-m-d');
        $tipocotizacion->updated_at = date('Y-m-d');
        $tipocotizacion->save();

        Flash::success('Se ha registrado de manera exitosa!');
    
               //Flash::success('Se ha registrado de manera exitosa!');
        return redirect('/tipocotizacion')->with('message','store');
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
      $tipocotizacion = tipocotizacion::find($id);
      return view('configuracion.tipocotizacion.show',compact('tipocotizacion'));
   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
       $tipocotizacion = tipocotizacion::find($id);
       return view('configuracion.tipocotizacion.edit',compact('tipocotizacion'));

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
        //
        $tipocotizacion = tipocotizacion::find($id);
        $tipocotizacion->fill($request->all());
        $tipocotizacion->save();
        Flash::success('Se ha actualizado de manera exitosa!');
        return redirect('/tipocotizacion')->with('message','store');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tipocotizacion= tipocotizacion::find($id);
        $tipocotizacion->destroy($id);
        Flash::success('Se ha eliminado el registro de manera exitosa!');
        $tipocotizacion = tipocotizacion::orderBy('id', 'ASC')->paginate(6);
        return view('configuracion.tipocotizacion.index')->with('tipocotizacion', $tipocotizacion);

    }
}
