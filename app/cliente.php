<?php

namespace sigaci;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
        	protected $table = 'cliente';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','codigo','rif','nit','nombre','direccion','telefono','email','id_estatus','id_usuario'];
    protected $guarded  = ['id'];

    public function user(){

    	return $this->belongsTo('sigaci\User');
    }

     public function scopeCodigo($query,$codigo)
    {
        //dd("scope: ".$codigo);
        $query -> where('rif','LIKE',$rif.'%');

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
