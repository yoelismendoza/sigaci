<?php

namespace sigaci;

use Illuminate\Database\Eloquent\Model;

class inventario extends Model
{
    protected $table = 'inventario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','id_almacen','id_ejercicio','desde','hasta','id_estatus','id_usuario'];
    protected $guarded  = ['id'];

    public function user(){

    	return $this->belongsTo('sigaci\User');
    }

     public function scopecambio($query,$idejercicio,$idalmacen,$desde,$hasta)
    {
        //dd("scope: ".$codigo);
        $query -> where('id_ejercicio','=',$idejercicio)
               -> where('id_almacen','=',$idalmacen)
               -> where('desde','=',$desde)
               -> where('hasta','=',$hasta);

    }
}
