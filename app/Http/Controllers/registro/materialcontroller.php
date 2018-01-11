<?php

namespace sigaci\Http\Controllers\registro;

use Illuminate\Http\Request;

use sigaci\Http\Requests;
use sigaci\Http\Controllers\Controller;
use sigaci\material;
use sigaci\tipomaterial;
use Laracasts\Flash\Flash;
use sigaci\Http\Requests\materialrequest;

class materialcontroller extends Controller
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
        $tipomaterial    = tipomaterial::where('id_estatus', $estatus)->lists('descripcion', 'id');
        $codigo          = $request->codigo;
        $descripcion     = $request->descripcion;
        $idtipomaterial  = $request->idtipomaterial;
        
        if($codigo=='' And $descripcion=='' And $idtipomaterial==0)
        {
            $material = material::orderBy('id', 'ASC')->paginate(8);
        }
        if($codigo!='' And $descripcion=='' And $idtipomaterial==0)
        {
            $material = material::codigo($request->get("codigo"))->orderBy('id','DESC')->paginate(8);
        }
        if($codigo=='' And $descripcion!='' And $idtipomaterial==0)
        {
           
            $material = material::descripcion($descripcion)->orderBy('id','DESC')->paginate(8);
        }

        if($codigo=='' And $descripcion=='' And $idtipomaterial!=0)
        {
           $material = material::tipomaterial($idtipomaterial)->orderBy('id','DESC')->paginate(8);
        }

        if($codigo!='' And $descripcion!='' And $idtipomaterial==0)
        {
           $material = material::Codigodescripcion($codigo,$descripcion)->orderBy('id','DESC')->paginate(8);
        }

      if($codigo!='' And $descripcion=='' And $idtipomaterial!=0)
        {
            $material = material::CodigoTipo($codigo,$idtipomaterial)->orderBy('id','DESC')->paginate(8);
        }
      if($codigo=='' And $descripcion!='' And $idtipomaterial!=0)
        {
           $material = material::TipoDescripcion($idtipomaterial,$descripcion)->orderBy('id','DESC')->paginate(8);
        }

      if($codigo!='' And $descripcion!='' And $idtipomaterial!=0)
        {
           $material = material::CodigoDesTipo($codigo,$descripcion,$idtipomaterial)->orderBy('id','DESC')->paginate(8);
        }

        //else{$material = material::orderBy('id', 'ASC')->paginate(8);}
        return view('registro.material.index')->with('material', $material)
        ->with('tipomaterial', $tipomaterial);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session_start();       
        $estatus=1;
        //$idusuario = $_SESSION['usuario'];
        $tipomaterial = tipomaterial::where('id_estatus', $estatus)->lists('descripcion', 'id');
        return view('registro.material.crear')->with('tipomaterial', $tipomaterial);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(materialrequest $request)
    {
        $material = new material($request->all());
        $material->created_at = date('Y-m-d');
        $material->updated_at = date('Y-m-d');
        $serial = strtoupper($material->serial);
        $codigo = strtoupper($material->codigo);
        $descripcion = strtoupper($material->descripcion);
        $material->descripcion = $descripcion; 
        $material->serial = $serial;
        $material->codigo = $codigo;
        $material->save();

        Flash::success('Se ha registrado de manera exitosa!');
    
               //Flash::success('Se ha registrado de manera exitosa!');
        return redirect('/material')->with('message','store');
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
      session_start();   
      $estatus=1;
      $tipomaterial    = tipomaterial::where('id_estatus', $estatus)->lists('descripcion', 'id');  
      $material = material::find($id);
      return view('registro.material.show',compact('material'))->with('tipomaterial', $tipomaterial);
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
       $tipomaterial = tipomaterial::where('id_estatus', $estatus)->lists('descripcion', 'id'); 
       $material = material::find($id);
       return view('registro.material.edit',compact('material'))->with('tipomaterial', $tipomaterial);

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
        $material = material::find($id);
        $material->fill($request->all());
        $serial = strtoupper($material->serial);
        $codigo = strtoupper($material->codigo);
        $material->serial = $serial;
        $material->codigo = $codigo;
        $material->save();
        Flash::success('Se ha actualizado de manera exitosa!');
        return redirect('/material')->with('message','store');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estatus=1;
        $tipomaterial    = tipomaterial::where('id_estatus', $estatus)->lists('descripcion', 'id');
        //
        $material= material::find($id);
        $material->destroy($id);
        Flash::success('Se ha eliminado el registro de manera exitosa!');
        $material = material::orderBy('id', 'ASC')->paginate(6);
        return view('registro.material.index')->with('material', $material)
        ->with('tipomaterial', $tipomaterial);

    }}
