<?php

namespace sigaci;

use Illuminate\Database\Eloquent\Model;

class cotizacion extends Model
{
    protected $table = 'cotizacion';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','fecha','id_empresa','id_tipocotizacion','id_cliente','detalle','validez','id_estatus','id_usuario'];
    protected $guarded  = ['id'];

    public function user(){

    	return $this->belongsTo('sigaci\User');
    }

}
