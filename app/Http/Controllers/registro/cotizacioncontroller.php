<?php

namespace sigaci\Http\Controllers\registro;

use Illuminate\Http\Request;

use sigaci\Http\Requests;
use sigaci\Http\Controllers\Controller;
use sigaci\cliente;
use sigaci\cotizacion;
use sigaci\empresa;
use sigaci\cotizacion_detalle;
use sigaci\inventario;
use sigaci\tipocotizacion;
use sigaci\material;
use Laracasts\Flash\Flash;
use Illuminate\Support\facades\redirect;
use Illuminate\Support\facades\input;
use sigaci\Http\Requests\cotizacionrequest;
use Illuminate\Support\collection;
use Response;
use DB;
use PDF;
use Carbon\Carbon;
class cotizacioncontroller extends Controller
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
        $inventario = 1;
        $cliente = cliente::where('id_estatus', $estatus)->pluck('nombre', 'id');
        $empresa = empresa::where('id_estatus', $estatus)->pluck('nombre', 'id');
        $tipocotizacion = tipocotizacion::where('id_estatus', $estatus)->pluck('descripcion', 'id');
        $material = material::where('id_estatus', $estatus)->
                              where('inventario',$inventario)->pluck('descripcion','id');
        $cotizacion = cotizacion::orderBy('id', 'ASC')->paginate(8);
        $zmaterial = material::where('id_estatus',$estatus)->
                               where('id_inventario',$inventario)->get();
        if ($request)
        {
            $ncliente= trim($request->get('cliente'));
            if($ncliente==''){
            $cotizacion = DB::table('cotizacion as a')
                         ->join('cliente as b','a.id_cliente','=','b.id')
                         ->join('cotizacion_detalle as c','a.id','=','c.id_cotizacion')
                         ->select('a.id','a.fecha','b.nombre','validez')
                         ->groupby('a.id','a.fecha','b.nombre','validez')
                         ->orderBy('a.id','desc')
                         ->paginate(8);
           }else{
                        $cotizacion = DB::table('cotizacion as a')
                         ->join('cliente as b','a.id_cliente','=','b.id')
                         ->join('cotizacion_detalle as c','a.id','=','c.id_cotizacion')
                         ->select('a.id','a.fecha','b.nombre','validez')
                         ->where('b.nombre','LIKE','%'.$ncliente.'%')
                         ->groupby('a.id','a.fecha','b.nombre','validez')
                         ->orderBy('a.id','desc')
                         ->paginate(8);

           }              
        }
        return view('registro.cotizacion.index',['cotizacion'=>$cotizacion])
        ->with('cliente',$cliente)
        ->with('empresa',$empresa)
        ->with('material',$material)
        ->with('zmaterial',$zmaterial)
        ->with('tipocotizacion',$tipocotizacion);
     //return view('registro.cotizacion.index')->with('cotizacion', $cotizacion);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $estatus=1;
          $inventario=1;
        //$idusuario = $_SESSION['usuario'];
        $tipocotizacion = tipocotizacion::where('id_estatus', $estatus)->pluck('descripcion', 'id');
        $cliente = cliente::where('id_estatus', $estatus)->pluck('nombre', 'id');
        $empresa = empresa::where('id_estatus', $estatus)->pluck('nombre', 'id');
        $material = material::where('id_estatus', $estatus)->
                              where('inventario',$inventario)->pluck('descripcion','id');
        $zmaterial = material::where('id_estatus',$estatus)->
                               where('id_inventario',$inventario)->get();
      
        return view('registro.cotizacion.crear')->with('tipocotizacion', $tipocotizacion)
                                                ->with('cliente', $cliente)
                                                ->with('material', $material)
                                                ->with('empresa', $empresa)
                                                ->with('zmaterial', $zmaterial);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try{
            DB::beginTransaction();
            $cotizacion = new cotizacion;
            $cotizacion->id_cliente     = $request->get('id_cliente');
            $cotizacion->id_tipocotizacion = $request->get('id_tipocotizacion');
            $cotizacion->fecha          = $request->get('fecha');
            $cotizacion->validez        = $request->get('validez');
            $cotizacion->id_usuario     = $request->get('id_usuario');
            $cotizacion->id_estatus     = $request->get('id_estatus');
            $cotizacion->detalle        = $request->get('detalle');
            $cotizacion->created_at     = Carbon::now('America/Caracas');
            $cotizacion->updated_at     = Carbon::now('America/Caracas');
            $cotizacion->save();

            $idmaterial     = $request->get('idmaterial');
            //dd($idmaterial);
            $cantidad        = $request->get('cantidad');
            $precio          = $request->get('precio');
            //dd($idmaterial);

            $cont=0;
            while($cont < count($idmaterial))
            {
                $cotizacion_detalle = new cotizacion_detalle();
                $cotizacion_detalle->id_cotizacion = $cotizacion->id;
                $cotizacion_detalle->id_material = $idmaterial[$cont];
                $cotizacion_detalle->cantidad = $cantidad[$cont];
                $cotizacion_detalle->precio = $precio[$cont];
                $cotizacion_detalle->save();
                $cont = $cont + 1;
            }
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
        }
          return redirect('/cotizacion')->with('message','store')
        ->with('texto','Se ha registrado de manera exitosa!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        session_start();
         $estatus=1;
        //$idusuario = $_SESSION['usuario'];
        $empresa = empresa::where('id_estatus', $estatus)->pluck('nombre', 'id');
        $tipocotizacion = tipocotizacion::where('id_estatus', $estatus)->pluck('descripcion', 'id');
        $cliente = cliente::where('id_estatus', $estatus)->pluck('nombre', 'id');
        $cotizacion = DB::table('cotizacion as a')
                         ->join('cliente as b','a.id_cliente','=','b.id')
                         ->join('cotizacion_detalle as c','a.id','=','c.id_cotizacion')
                         ->select('a.id','a.validez','a.id_empresa','a.detalle','a.id_estatus','a.id_usuario','a.fecha','a.id_cliente','b.nombre','a.id_tipocotizacion')
                         ->where('a.id','=',$id)
                         ->first();
           $cotizacion_detalle = DB::table('cotizacion_detalle as a')
                         ->join('material as b','a.id_material','=','b.id')
                         ->select('a.id','a.id_material','b.descripcion','a.cantidad','a.precio')
                         ->where('a.id_cotizacion','=',$id)  
                         ->get();

            return view('registro.cotizacion.show',['cotizacion'=>$cotizacion,'cotizacion_detalle'=>$cotizacion_detalle,'cliente'=>$cliente,'tipocotizacion'=>$tipocotizacion,'empresa'=>$empresa]);                        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function pdf($id)
    {
        session_start();
         $estatus=1;
        //$idusuario = $_SESSION['usuario'];
        $tipocotizacion = tipocotizacion::where('id_estatus', $estatus)->pluck('descripcion', 'id');
        $cliente = cliente::where('id_estatus', $estatus)->pluck('nombre', 'id');
        $empresa = empresa::where('id_estatus',$estatus)->get();
        $cotizacion = DB::table('cotizacion as a')
                         ->join('cliente as b','a.id_cliente','=','b.id')
                         ->join('empresa as c','a.id_empresa','=','c.id')
                         ->join('cotizacion_detalle as d','a.id','=','d.id_cotizacion')
                         ->select('a.id','a.validez','a.detalle','a.id_estatus','a.id_usuario','a.fecha','a.id_cliente','b.nombre as nombrec','a.id_tipocotizacion','a.id_empresa','b.direccion','c.nombre as nombrep','c.descripcion as descripcion','c.logo as logo')
                         ->where('a.id','=',$id)
                         ->first();
        $cotizacion_detalle = DB::table('cotizacion_detalle as a')
                         ->join('material as b','a.id_material','=','b.id')
                         ->select('a.id','a.id_material','b.descripcion','a.cantidad','a.precio')
                         ->where('a.id_cotizacion','=',$id)  
                         ->get();
            
            //return view('registro.cotizacion.show',['cotizacion'=>$cotizacion,'cotizacion_detalle'=>$cotizacion_detalle,'cliente'=>$cliente,'tipocotizacion'=>$tipocotizacion]);  

        //$documento = Documento::find($id);
        //$view =  \View::make('registro.cotizacion.reporte', compact('cotizacion', 'cotizacion_detalle'))->render();
        
        //$view = \View::make('registro.cotizacion.reporte', compact('cotizacion'))->render();

        //$pdf = \App::make('dompdf.wrapper');
        //$pdf->loadHTML($view);
        //return $pdf->stream('cotizacion');
        $pdf = PDF::loadView('registro.cotizacion.reporte', compact('cotizacion'));

        return $pdf->download('cotizacion.pdf');

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
        $cotizacion= cotizacion::find($id);
        $cotizacion->destroy($id);
        $cotizacion_detalle = cotizacion_detalle::where('id_cotizacion',$id)->get();

        Flash::success('Se ha eliminado el registro de manera exitosa!');
        $cotizacion = cotizacion::orderBy('id', 'ASC')->paginate(8);
        return view('registro.cotizacion.index')->with('cotizacion', $cotizacion);
        
    }

   public function carga(request $request)
    {

        session_start();
        $usuario     =  $_SESSION['usuario'];
        $fecha       = date("Y-m-d");
        $id          = $request->get("id");
        $cantidad    = $request->get("cantidad");  
        $precio_venta      = $request->get("precio_venta");
        $id_material = $request->get("id_material");
        $zdetallecotizacion = cotizacion_detalle::where('id_cotizacion','=',$id)
                                ->where('id_material','=',$id_material)->get();
        $id_deta = isset($zdetallecotizacion->id_cotizacion);
        if($id_deta>0)
        { 
           return redirect('/cotizacion')->with('message','store')
            ->with('texto','Material ya Existe en la cotizacion, No se permite duplicados!');
        } 
        else{
            $cotizacion_detalle = new cotizacion_detalle;
            $cotizacion_detalle->id_cotizacion = $id;
            $cotizacion_detalle->id_material = $id_material;
            $cotizacion_detalle->cantidad = $cantidad;
            $cotizacion_detalle->precio = $precio_venta;
            $cotizacion_detalle->id_usuario= $usuario;
            $cotizacion_detalle->created_at = date("Y-m-d");
            $cotizacion_detalle->updated_at = date("Y-m-d");
            $cotizacion_detalle->save();
             Flash::success('Se ha registrado de manera exitosa!');  
           return redirect('/cotizacion')->with('message','store')
        ->with('texto','Se ha registrado de manera exitosa!');  
        }

        
    } 
   public function duplicar(request $request)
   {

        session_start();
        $usuario     =  $_SESSION['usuario'];
        $fecha       = date("Y-m-d");
        $id          = $request->get("id");
        $cliente     = $request->get("id_cliente");
        $empresa     = $request->get("id_empresa");  
        $zcotizacion = cotizacion::find($id);
        $zid_tipocotizacion = $zcotizacion->id_tipocotizacion;
        $id_tipocotizacion = $request->get("id_tipocotizacion");
        $id_estatus = $zcotizacion->id_estatus;
        $validez    = $zcotizacion->validez;
        //Duplicando la cotizacion
        $cotizacion = new cotizacion;
        $cotizacion->id_cliente = $cliente;
        $cotizacion->id_empresa = $empresa;
        $cotizacion->fecha = $fecha;
        $cotizacion->id_estatus = $id_estatus;
        $cotizacion->validez = $validez;
        $cotizacion->created_at = date("Y-m-d");
        $cotizacion->updated_at = date("Y-m-d");
        $porcentaje = 0;
        if($zid_tipocotizacion!=$id_tipocotizacion)
        {
          $cotizacion->id_tipocotizacion = $id_tipocotizacion; 
          $tipocotizacion=tipocotizacion::find("$id_tipocotizacion");
          $porcentaje = isset($tipocotizacion->porcentaje);   
        }else{ $cotizacion->id_tipocotizacion = $id_tipocotizacion;}
        $cotizacion->save();
        //Creando detalle del duplicado
        $zdetallecotizacion = cotizacion_detalle::where('id_cotizacion','=',$id)->get();
        
        foreach ($zdetallecotizacion as $zdetas) 
        {
            $cotizacion_detalle = new cotizacion_detalle;
            $cotizacion_detalle->id_cotizacion = $cotizacion->id;
            $cotizacion_detalle->id_material = $zdetas->id_material;
            $cotizacion_detalle->cantidad = $zdetas->cantidad;
            $cotizacion_detalle->id_usuario = $usuario;
            if($porcentaje>0)
            {
              $cotizacion_detalle->precio = $zdetas->precio+(($zdetas->precio*$porcentaje)/100);
            }else{ $cotizacion_detalle->precio = $zdetas->precio;}
            $cotizacion_detalle->created_at = date("Y-m-d");
            $cotizacion_detalle->updated_at = date("Y-m-d");
            $cotizacion_detalle->save();

        }
            Flash::success('Se ha registrado de manera exitosa!');  
           return redirect('/cotizacion')->with('message','store')
        ->with('texto','Se ha registrado de manera exitosa!');  
        

 }

}