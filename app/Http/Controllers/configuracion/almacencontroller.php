<?php

namespace sigaci\Http\Controllers\configuracion;

use Illuminate\Http\Request;

use sigaci\Http\Requests;
use sigaci\Http\Controllers\Controller;
use sigaci\almacen;
use sigaci\ejercicio;
use Laracasts\Flash\Flash;
use sigaci\Http\Requests\almacenrequest;
class almacencontroller extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_start();
        $almacen = almacen::orderBy('id', 'ASC')->paginate(6);
        return view('configuracion.almacen.index')->with('almacen', $almacen);

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
                $estatus=1;
        //$idusuario = $_SESSION['usuario'];
        $ejercicio = ejercicio::where('id_estatus', $estatus)->lists('desde', 'id');

        return view('configuracion.almacen.crear')->with('ejercicio', $ejercicio);
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(almacenrequest $request)
    {
                 //$tipoempresa = new tipoempresa;
        //$tipoempresa -> create($request->All());
        $almacen = new almacen($request->all());
        $almacen->created_at = date('Y-m-d');
        $almacen->updated_at = date('Y-m-d');
        $almacen->save();

        Flash::success('Se ha registrado de manera exitosa!');
    
               //Flash::success('Se ha registrado de manera exitosa!');
        return redirect('/almacen')->with('message','store');
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
      $almacen = almacen::find($id);
      return view('configuracion.almacen.show',compact('almacen'));
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
       $almacen = almacen::find($id);
       return view('configuracion.almacen.edit',compact('almacen'));

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
        $almacen = almacen::find($id);
        $almacen->fill($request->all());
        $almacen->save();
        Flash::success('Se ha actualizado de manera exitosa!');
        return redirect('/almacen')->with('message','store');

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
        $almacen= almacen::find($id);
        $almacen->destroy($id);
        Flash::success('Se ha eliminado el registro de manera exitosa!');
        $almacen = almacen::orderBy('id', 'ASC')->paginate(6);
        return view('configuracion.almacen.index')->with('almacen', $almacen);

    }
}
