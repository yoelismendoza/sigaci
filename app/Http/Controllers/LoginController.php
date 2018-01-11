<?php

namespace sigaci\Http\Controllers;

use Illuminate\Http\Request;
use sigaci\User;
use sigaci\Menu;
use sigaci\SubMenu;
use sigaci\Http\Requests;
use sigaci\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            return view('layouts.login');

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
      $usuario   = $request->usuario; 
      $password  = $request->password;
      $pass = md5($password);
      //dd($request->all());  
      //exit;
      $user = User::where('password','=',$pass)->first();
	  
      if($user!=null){
             if($user->id_estatus == 1){
              session_start();
              $_SESSION['usuario']  = $user->id;
              $_SESSION['perfil']  = $user->perfil;
              $_SESSION['nombre']  = $user->name;
			  
			  //$valor=1;
			  //$menu=Menu::where('id_estatus','=',$valor)->get(['id', 'descripcion']);
			  //$submenu=SubMenu::where('id_estatus','=',$valor)->get(['id','id_menu','id_submenu', 'descripcion', 'direccion']);
			  //dd($menu);
              return view('layouts.index');
			  //->with('menu',$menu)
			  //->with('submenu',$submenu);   
              }
              else 
              {
               Flash::error("Su usuario se encuentra inactivo.");
               return view('layouts.login');

              } 
  
            }
            else {
            Flash::error("No tiene permiso para acceder al sitio.");
            return view('layouts.login');
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
