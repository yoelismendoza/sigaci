<?php

namespace sigaci\Http\Controllers\registro;

use Illuminate\Http\Request;

use sigaci\Http\Requests;
use sigaci\Http\Controllers\Controller;
use sigaci\inventario;
use sigaci\movimientos;
use sigaci\detalle_movimientos;
use sigaci\ejercicio;
use sigaci\almacen;
use sigaci\material;
use DB;
use Response;
use Carbon\Carbon;
use Laracasts\Flash\Flash;
use sigaci\Http\Requests\inventariorequest;
use sigaci\Http\Requests\movimientosrequest;

class inventariocontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {
        session_start();
        $estatus=1;
        $ejercicio = ejercicio::where('id_estatus', $estatus)->lists('desde', 'id');
        $almacen = almacen::where('id_estatus', $estatus)->lists('descripcion', 'id');
        $material = material::where('id_estatus', $estatus)->lists('descripcion','id');

        $inventario = inventario::orderBy('id', 'ASC')->paginate(8);
        return view('registro.inventario.index')->with('inventario', $inventario)
        ->with('almacen', $almacen)
        ->with('ejercicio', $ejercicio)
        ->with('material', $material);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    $estatus=1;
        //$idusuario = $_SESSION['usuario'];
        $ejercicio = ejercicio::where('id_estatus', $estatus)->lists('desde', 'id');
        $almacen = almacen::where('id_estatus', $estatus)->lists('descripcion', 'id');
        $material = material::where('id_estatus', $estatus)->lists('descripcion','id');
      
        return view('registro.inventario.crear')->with('ejercicio', $ejercicio)
                                                ->with('almacen', $almacen)
                                                ->with('material', $material);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inventario = new inventario($request->all());
        $inventario->created_at = date('Y-m-d');
        $inventario->updated_at = date('Y-m-d');
        $idejercicio=$inventario->id_ejercicio;
        $idalmacen=$inventario->id_almacen;
        $desde=$inventario->desde;
        $hasta=$inventario->hasta;
        //$zinventario=inventario::cambio($idejercicio,$idalmacen,$desde,$hasta)->orderBy('id','DESC')->paginate(8);
        $zzinventario = inventario::where('id_ejercicio','=',$idejercicio)->where('id_almacen','=',$idalmacen)->where('desde','=',$desde)->where('hasta','=',$hasta)->first();
        if(isset($zzinventario->id))
         
        { 
          
           return redirect('/inventario')->with('message','store')
            ->with('texto','Inventario Ya Existe, No se permite duplicados!');
        } 
        else{
        $inventario->save();
        $tipo=4;
        $fecha=date("Y-m-d");
        $movimientos = new movimientos();
        $movimientos->id_inventario = $inventario->id;
        $movimientos->detalle       = "Carga Inicial de Inventario";
        $movimientos->id_usuario    = $inventario->id_usuario;
        $movimientos->fecha         = $fecha;
        $movimientos->created_at    = date("Y-m-d");
        $movimientos->updated_at    = date("Y-m-d");
        $movimientos->id_tipomovimiento = $tipo;
        $movimientos->save();
        $idmaterial     = $request->get('idmaterial');
        $cantidad       = $request->get('cantidad');
        $precioc        = $request->get('precioc');
        $preciov        = $request->get('preciov'); 
        $cont=0;
        
        while($cont < count($idmaterial))
         {
           $detalle_movimientos = new detalle_movimientos();
           $detalle_movimientos->id_movimiento = $movimientos->id;
           $detalle_movimientos->id_material   = $idmaterial[$cont];
           $detalle_movimientos->cantidad      = $cantidad[$cont];
           $detalle_movimientos->precio_compra = $precioc[$cont];
           $detalle_movimientos->precio_venta  = $preciov[$cont];
           $detalle_movimientos->save();
           $material=material::find($idmaterial[$cont]);
           $material->cantidad_actual = $cantidad[$cont];
           $material->precio_compra   = $precioc[$cont];
           $material->precio_venta    = $preciov[$cont];
           $material->inventario = 1;
           $material->id_inventario   = $inventario->id;
           $material->save();
           $cont++;
         }
        Flash::success('Se ha registrado de manera exitosa!');  
        return redirect('/inventario')->with('message','store')
        ->with('texto','Se ha registrado de manera exitosa!');  
        }    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $estatus=1;
      $ejercicio      = ejercicio::where('id_estatus', $estatus)->lists('desde', 'id');
      $almacen        = almacen::where('id_estatus', $estatus)->lists('descripcion', 'id');  
      $inventario     = inventario::find($id);
      $zzmovimientos  = movimientos::where('id_inventario','=',$id)->first();
      $idmovimiento = $zzmovimientos->id;

      $detalles     = DB::table('detalle_movimientos as a')
                         ->join('material as b','a.id_material','=','b.id')
                         ->select('a.id','a.id_movimiento','a.id_material','b.descripcion','a.precio_compra','a.precio_venta','a.cantidad')
                         ->where('a.id_movimiento','=',$idmovimiento)
                         ->orderBy('a.id','asc')
                         ->paginate(8);

      return view('registro.inventario.show',compact('inventario'))
                                    ->with('ejercicio', $ejercicio)
                                    ->with('almacen', $almacen)
                                    ->with('detalles',$detalles);
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
      $estatus=1;
      $ejercicio = ejercicio::where('id_estatus', $estatus)->lists('desde', 'id');
      $almacen = almacen::where('id_estatus', $estatus)->lists('descripcion', 'id');  
      $inventario = inventario::find($id);
      return view('registro.inventario.edit',compact('inventario'))
      ->with('ejercicio', $ejercicio)
        ->with('almacen', $almacen);

    }
    public function carga(request $request)
    {
        session_start();
        $usuario     =  $_SESSION['usuario'];
        $fecha       = date("Y-m-d");
        $id          = $request->get("id");
        $cantidad    = $request->get("cantidad");
        $precio_compra      = $request->get("precio_compra");
        $precio_venta      = $request->get("precio_venta");
        $id_material = $request->get("id_material");
        $detalle     = $request->get("detalle");
        $idmovimiento = 4;
               
        $zmovimientos = movimientos::where('id_inventario','=',$id)->where('id_tipomovimiento','=',$idmovimiento)->first();
        $id_movimiento = isset($zmovimientos->id);
        $zdetallemovimientos = detalle_movimientos::where('id_movimiento','=',$id_movimiento)->where('id_material','=',$id_material)->first();
        $id_deta = isset($zdetallemovimientos->id);
        if($id_deta>0)
        { 
           return redirect('/inventario')->with('message','store')
            ->with('texto','Material ya Existe en Inventario, No se permite duplicados!');
        } 
        else{
            $detalle_movimientos = new detalle_movimientos;
            $detalle_movimientos->id_movimiento = $id_movimiento;
            $detalle_movimientos->id_material   = $id_material;
            $detalle_movimientos->cantidad      = $cantidad;
            $detalle_movimientos->precio_compra        = $precio_compra;
            $detalle_movimientos->precio_venta        = $precio_venta;
            $detalle_movimientos->created_at    = date('Y-m-d');
            $detalle_movimientos->updated_at    = date('Y-m-d');
            $detalle_movimientos->id_usuario    = $usuario;
            $detalle_movimientos->save();
            $material=material::find($id_material);
            $material->cantidad_actual=$cantidad;
            $material->precio_compra=$precio_compra;
            $material->precio_venta=$precio_venta;
            $material->inventario = 1;
            $material->id_inventario =$id;
            $material->save();

        Flash::success('Se ha registrado de manera exitosa!');  
        return redirect('/inventario')->with('message','store')
        ->with('texto','Se ha registrado de manera exitosa!');  
        }    
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
        $inventario = inventario::find($id);
        $inventario->fill($request->all());
        $inventario->save();
        Flash::success('Se ha actualizado de manera exitosa!');
        return redirect('/inventario')->with('message','store');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        $inventario= inventario::find($id);
        $inventario->destroy($id);
        Flash::success('Se ha eliminado el registro de manera exitosa!');
        $inventario = inventario::orderBy('id', 'ASC')->paginate(8);
        return view('registro.inventario.index')->with('inventario', $inventario);
    }
}
