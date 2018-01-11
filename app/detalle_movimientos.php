<?php

namespace sigaci;

use Illuminate\Database\Eloquent\Model;

class detalle_movimientos extends Model
{
    protected $table = 'detalle_movimientos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','id_movimiento','id_material','precio_compra','precio_venta','cantidad'];
    protected $guarded  = ['id'];

    public function user(){

    	return $this->belongsTo('sigaci\User');
    }
}
