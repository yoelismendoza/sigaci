<?php

namespace sigaci\Http\Controllers\configuracion;

use Illuminate\Http\Request;
use sigaci\tipomaterial;
use sigaci\Http\Requests;
use sigaci\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use sigaci\Http\Requests\tipomaterialrequest;

class tipomaterialcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_start();
        $tipomaterial = tipomaterial::orderBy('id', 'ASC')->paginate(6);
        return view('configuracion.tipomaterial.index')->with('tipomaterial', $tipomaterial);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracion.tipomaterial.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(tipomaterialrequest $request)
    {
        //$tipomaterial = new tipomaterial;
        //$tipomaterial -> create($request->All());
        $tipomaterial = new tipomaterial($request->all());
        $tipomaterial->created_at = date('Y-m-d');
        $tipomaterial->updated_at = date('Y-m-d');
        $tipomaterial->save();

        Flash::success('Se ha registrado de manera exitosa!');
    
               //Flash::success('Se ha registrado de manera exitosa!');
        return redirect('/tipomaterial')->with('message','store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $tipomaterial = tipomaterial::find($id);
        return view('configuracion.tipomaterial.show', compact('tipomaterial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $tipomaterial = tipomaterial::find($id);
       return view('configuracion.tipomaterial.edit', compact('tipomaterial'));
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
        $tipomaterial = tipomaterial::find($id);
        $tipomaterial->fill($request->all());
        $tipomaterial->save();
        Flash::success('Se ha actualizado de manera exitosa!');
        return redirect('/tipomaterial')->with('message','store');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipomaterial= tipomaterial::find($id);
        $tipomaterial->destroy($id);
        Flash::success('Se ha eliminado el registro de manera exitosa!');
        $tipomaterial = tipomaterial::orderBy('id', 'ASC')->paginate(6);
        return view('configuracion.tipomaterial.index')->with('tipomaterial', $tipomaterial);

    }
}
