<?php

namespace sigaci;

use Illuminate\Database\Eloquent\Model;

class proveedor extends Model
{
         	protected $table = 'proveedor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','rif','nit','nombre','direccion','telefono','email','id_estatus','id_usuario'];
    protected $guarded  = ['id'];

    public function user(){

    	return $this->belongsTo('sigaci\User');
    }

     public function scopeRif($query,$rif)
    {
        //dd("scope: ".$codigo);
        $query -> where('rif','LIKE',$rif.'%');

    }

    public function scopeNombre($query,$nombre)
    {
        //dd("scope: ".$codigo);
        $query -> where('nombre','LIKE','%'.$nombre.'%');

    }
     public function scopeRifNombre($query,$rif,$nombre)
    {
        //dd("scope: ".$codigo);
        $query -> where('rif','LIKE',$rif.'%')
               -> where('nombre','LIKE','%'.$nombre.'%');

    }
}
