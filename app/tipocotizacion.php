<?php

namespace sigaci;

use Illuminate\Database\Eloquent\Model;

class tipocotizacion extends Model
{
	protected $table = 'tipocotizacion';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','descripcion','desde','hasta','id_estatus','id_usuario'];
    protected $guarded  = ['id'];

    public function user(){

    	return $this->belongsTo('sigaci\User');
    }
}
