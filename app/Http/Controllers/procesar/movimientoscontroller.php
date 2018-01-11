<?php

namespace sigaci\Http\Controllers\procesar;

use Illuminate\Http\Request;

use sigaci\Http\Requests;
use sigaci\Http\Controllers\Controller;
use sigaci\cliente;
use sigaci\tipomovimiento;
use sigaci\movimientos;
use sigaci\material;
use Laracasts\Flash\Flash;
use Illuminate\Support\facades\redirect;
use Illuminate\Support\facades\input;
use sigaci\Http\Requests\movimientosrequest;
use Illuminate\Support\collection;
use Response;
use DB;
use Carbon\Carbon;

class movimientoscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        session_start();
        $estatus=1;
        $inventario = 1;
        $cliente = cliente::where('id_estatus', $estatus)->lists('nombre', 'id');
        $material = material::where('id_estatus', $estatus)->
                              where('inventario',$inventario)->lists('descripcion','id');
        $cotizacion = movimientos::orderBy('id', 'ASC')->paginate(8);

        if ($request)
        {
            $ncliente= trim($request->get('cliente'));
            $movimientos = DB::table('movimientos as a')
                         ->join('tipomovimiento as b','a.id_tipomovimiento','=','b.id')
                         ->select('a.id','a.fecha','a.detalle','b.descripcion as tipo')
                         ->orderBy('a.id','desc')
                         ->paginate(8);
        }
        return view('procesar.movimientos.index',['movimientos'=>$movimientos]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
    }
}
