<?php

namespace sigaci;

use Illuminate\Database\Eloquent\Model;

class movimientos extends Model
{
   protected $table = 'movimientos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','id_inventario','detalle','id_usuario'];
    protected $guarded  = ['id'];

    public function user(){

    	return $this->belongsTo('sigaci\User');
    }
}
