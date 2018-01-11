<?php

namespace sigaci;

use Illuminate\Database\Eloquent\Model;

class cotizacion_detalle extends Model
{
     protected $table = 'cotizacion_detalle';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','id_cotizacion','id_material','cantidad','precio','id_usuario'];
    protected $guarded  = ['id'];

    public function user(){

    	return $this->belongsTo('sigaci\User');
    }
}
