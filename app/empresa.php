<?php

namespace sigaci;

use Illuminate\Database\Eloquent\Model;

class empresa extends Model
{
	protected $table = 'empresa';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','nombre','descripcion','direccion','rif','nit','representante','ci_representante','id_tipo_empresa','desde','hasta','id_estatus','id_usuario'];
    protected $guarded  = ['id'];

    public function user(){

    	return $this->belongsTo('sigaci\User');
    }
}
