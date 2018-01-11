<?php

namespace sigaci;

use Illuminate\Database\Eloquent\Model;

class parametros extends Model
{
	protected $table = 'parametros';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','descripcion','monto','desde','hasta','id_estatus','id_usuario','id_ejercicio'];
    protected $guarded  = ['id'];

    public function user(){

    	return $this->belongsTo('sigaci\User');
    }
}
