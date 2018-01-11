<?php

namespace sigaci\Http\Controllers\configuracion;

use Illuminate\Http\Request;

use sigaci\Http\Requests;
use sigaci\Http\Controllers\Controller;
use sigaci\ejercicio;
use Laracasts\Flash\Flash;
use sigaci\Http\Requests\ejerciciorequest;

class ejerciciocontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_start();
        $ejercicio = ejercicio::orderBy('id', 'ASC')->paginate(6);
        return view('configuracion.ejercicio.index')->with('ejercicio', $ejercicio);

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
        return view('configuracion.ejercicio.crear');
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ejerciciorequest $request)
    {
                 //$tipoempresa = new tipoempresa;
        //$tipoempresa -> create($request->All());
        $ejercicio = new ejercicio($request->all());
        $ejercicio->created_at = date('Y-m-d');
        $ejercicio->updated_at = date('Y-m-d');
        $ejercicio->save();

        Flash::success('Se ha registrado de manera exitosa!');
    
               //Flash::success('Se ha registrado de manera exitosa!');
        return redirect('/ejercicio')->with('message','store');
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
      $ejercicio = ejercicio::find($id);
      return view('configuracion.ejercicio.show',compact('ejercicio'));
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
       $ejercicio = ejercicio::find($id);
       return view('configuracion.ejercicio.edit',compact('ejercicio'));

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
        $ejercicio = ejercicio::find($id);
        $ejercicio->fill($request->all());
        $ejercicio->save();
        Flash::success('Se ha actualizado de manera exitosa!');
        return redirect('/ejercicio')->with('message','store');

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
        $ejercicio= ejercicio::find($id);
        $ejercicio->destroy($id);
        Flash::success('Se ha eliminado el registro de manera exitosa!');
        $ejercicio = ejercicio::orderBy('id', 'ASC')->paginate(6);
        return view('configuracion.ejercicio.index')->with('ejercicio', $ejercicio);

    }
}
