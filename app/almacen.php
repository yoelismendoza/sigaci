<?php

namespace sigaci;

use Illuminate\Database\Eloquent\Model;

class almacen extends Model
{
    protected $table = 'almacen';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','descripcion','id_estatus','id_usuario','id_ejercicio'];
    protected $guarded  = ['id'];

    public function user(){

    	return $this->belongsTo('sigaci\User');
    }
}
