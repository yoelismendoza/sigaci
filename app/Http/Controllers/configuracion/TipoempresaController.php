<?php

namespace sigaci\Http\Controllers\configuracion;

use Illuminate\Http\Request;
use sigaci\Menu;
use sigaci\SubMenu;
use sigaci\Tipoempresa;
use sigaci\Http\Requests;
use sigaci\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use sigaci\Http\Requests\tipoempresarequest;

class TipoempresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_start();
        $tipoempresa = Tipoempresa::orderBy('id', 'ASC')->paginate(6);
        return view('configuracion.tipoempresa.index')->with('tipoempresa', $tipoempresa);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracion.tipoempresa.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(tipoempresarequest $request)
    {
        //$tipoempresa = new tipoempresa;
        //$tipoempresa -> create($request->All());
	    $tipoempresa = new Tipoempresa($request->all());
        $tipoempresa->created_at = date('Y-m-d');
        $tipoempresa->updated_at = date('Y-m-d');
        $tipoempresa->save();

        Flash::success('Se ha registrado de manera exitosa!');
    
               //Flash::success('Se ha registrado de manera exitosa!');
        return redirect('/tipoempresa')->with('message','store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $tipoempresa = tipoempresa::find($id);
        return view('configuracion.tipoempresa.show', compact('tipoempresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $tipoempresa = tipoempresa::find($id);
       return view('configuracion.tipoempresa.edit', compact('tipoempresa'));
        //
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
		$desde = $request['desde'];
		//dd($desde);
        $tipoempresa = tipoempresa::find($id);
        $tipoempresa->fill($request->all());
        $tipoempresa->save();
        Flash::success('Se ha actualizado de manera exitosa!');
        return redirect('/tipoempresa')->with('message','store');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipoempresa= Tipoempresa::find($id);
        $tipoempresa->destroy($id);
        Flash::success('Se ha eliminado el registro de manera exitosa!');
        $tipoempresa = Tipoempresa::orderBy('id', 'ASC')->paginate(6);
        return view('configuracion.tipoempresa.index')->with('tipoempresa', $tipoempresa);

    }
}
