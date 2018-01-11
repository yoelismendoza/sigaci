<?php

namespace sigaci\Http\Controllers\configuracion;

use Illuminate\Http\Request;
use sigaci\tipomovimiento;
use sigaci\Http\Requests;
use sigaci\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use sigaci\Http\Requests\tipomovimientorequest;

class tipomovimientocontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_start();
        $tipomovimiento = tipomovimiento::orderBy('id', 'ASC')->paginate(6);
        return view('configuracion.tipomovimiento.index')->with('tipomovimiento', $tipomovimiento);

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
        return view('configuracion.tipomovimiento.crear');
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(tipomovimientorequest $request)
    {
                 //$tipoempresa = new tipoempresa;
        //$tipoempresa -> create($request->All());
        $tipomovimiento = new tipomovimiento($request->all());
        $tipomovimiento->created_at = date('Y-m-d');
        $tipomovimiento->updated_at = date('Y-m-d');
        $tipomovimiento->save();

        Flash::success('Se ha registrado de manera exitosa!');
    
               //Flash::success('Se ha registrado de manera exitosa!');
        return redirect('/tipomovimiento')->with('message','store');
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
      $tipomovimiento = tipomovimiento::find($id);
      return view('configuracion.tipomovimiento.show',compact('tipomovimiento'));
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
       $tipomovimiento = tipomovimiento::find($id);
       return view('configuracion.tipomovimiento.edit',compact('tipomovimiento'));

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
        $tipomovimiento = tipomovimiento::find($id);
        $tipomovimiento->fill($request->all());
        $tipomovimiento->save();
        Flash::success('Se ha actualizado de manera exitosa!');
        return redirect('/tipomovimiento')->with('message','store');

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
        $tipomovimiento= tipomovimiento::find($id);
        $tipomovimiento->destroy($id);
        Flash::success('Se ha eliminado el registro de manera exitosa!');
        $tipomovimiento = tipomovimiento::orderBy('id', 'ASC')->paginate(6);
        return view('configuracion.tipomovimiento.index')->with('tipomovimiento', $tipomovimiento);

    }
}
