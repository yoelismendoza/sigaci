<?php

namespace sigaci\Http\Controllers\configuracion;

use Illuminate\Http\Request;

use sigaci\Http\Requests;
use sigaci\Http\Controllers\Controller;
use sigaci\parametros;
use sigaci\ejercicio;
use Laracasts\Flash\Flash;
use sigaci\Http\Requests\parametrosrequest;

class parametroscontroller extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_start();
        $parametros = parametros::orderBy('id', 'ASC')->paginate(6);
        return view('configuracion.parametros.index')->with('parametros', $parametros);

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

        return view('configuracion.parametros.crear')->with('ejercicio', $ejercicio);
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(parametrosrequest $request)
    {
                 //$tipoempresa = new tipoempresa;
        //$tipoempresa -> create($request->All());
        $parametros = new parametros($request->all());
        $parametros->created_at = date('Y-m-d');
        $parametros->updated_at = date('Y-m-d');
        $parametros->save();

        Flash::success('Se ha registrado de manera exitosa!');
    
               //Flash::success('Se ha registrado de manera exitosa!');
        return redirect('/parametros')->with('message','store');
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
      $parametros = parametros::find($id);
      return view('configuracion.parametros.show',compact('parametros'));
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
       $parametros = parametros::find($id);
       return view('configuracion.parametros.edit',compact('parametros'));

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
        $parametros = parametros::find($id);
        $parametros->fill($request->all());
        $parametros->save();
        Flash::success('Se ha actualizado de manera exitosa!');
        return redirect('/parametros')->with('message','store');

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
        $parametros= parametros::find($id);
        $parametros->destroy($id);
        Flash::success('Se ha eliminado el registro de manera exitosa!');
        $parametros = parametros::orderBy('id', 'ASC')->paginate(6);
        return view('configuracion.parametros.index')->with('parametros', $parametros);

    }
}
