<?php

namespace sigaci\Http\Controllers\configuracion;

use Illuminate\Http\Request;

use sigaci\Http\Requests;
use sigaci\Http\Controllers\Controller;
use sigaci\empresa;
use sigaci\Tipoempresa;
use Laracasts\Flash\Flash;
use sigaci\Http\Requests\empresarequest;

class empresacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_start();
        $empresa = empresa::orderBy('id', 'ASC')->paginate(6);
        return view('configuracion.empresa.index')->with('empresa', $empresa);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //session_start();
        $estatus=1;
        //$idusuario = $_SESSION['usuario'];
        $tipoempresa = Tipoempresa::where('id_estatus', $estatus)->lists('descripcion', 'id');
        return view('configuracion.empresa.crear')->with('tipoempresa', $tipoempresa);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(empresarequest $request)
    {
         //$tipoempresa = new tipoempresa;
        //$tipoempresa -> create($request->All());
        $empresa = new empresa($request->all());
        $empresa->created_at = date('Y-m-d');
        $empresa->updated_at = date('Y-m-d');
        $nombre      = strtoupper($empresa->nombre);
        $descripcion = strtoupper($empresa->descripcion);
        $empresa->nombre = $nombre;
        $empresa->descripcion = $descripcion;
      if($request->file('logo')){
            $logo = $request->file('logo');    
            $name_logo = 'logo_'.time().'.'.$logo->getClientOriginalExtension();
            $path = public_path().'/img/logo/';
            if(!empty($logo_temp)){
            unlink($path.$logo_temp);  
            }            
            $logo->move($path, $name_logo);
            $empresa->logo = $name_logo;
        }
    
        $empresa->save();

        Flash::success('Se ha registrado de manera exitosa!');
    
               //Flash::success('Se ha registrado de manera exitosa!');
        return redirect('/empresa')->with('message','store');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     $empresa = empresa::find($id);
       $tipoempresa = Tipoempresa::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');
       return view('configuracion.empresa.show',compact('empresa'))->with('tipoempresa', $tipoempresa);
      }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $empresa = empresa::find($id);
       $tipoempresa = Tipoempresa::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');
       return view('configuracion.empresa.edit',compact('empresa'))->with('tipoempresa', $tipoempresa);
  
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
        $empresa = empresa::find($id);

        $empresa->fill($request->all());
        $nombre      = strtoupper($empresa->nombre);
        $descripcion = strtoupper($empresa->descripcion);
        $empresa->nombre = $nombre;
        $empresa->descripcion = $descripcion;
        if($request->file('logo')){
            $logo = $request->file('logo');    
            $name_logo = 'logo_'.time().'.'.$logo->getClientOriginalExtension();
            $path = public_path().'/img/logo/';
            if(!empty($logo_temp)){
            unlink($path.$logo_temp);  
            }            
            $logo->move($path, $name_logo);
            $empresa->logo = $name_logo;
        }



        $empresa->save();
        Flash::success('Se ha actualizado de manera exitosa!');
        return redirect('/empresa')->with('message','store');
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa= empresa::find($id);
        $empresa->destroy($id);
        Flash::success('Se ha eliminado el registro de manera exitosa!');
        $empresa = empresa::orderBy('id', 'ASC')->paginate(6);
        return view('configuracion.empresa.index')->with('empresa', $empresa);
    }
}
