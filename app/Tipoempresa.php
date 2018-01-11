<?php

namespace sigaci;

use Illuminate\Database\Eloquent\Model;

class Tipoempresa extends Model
{
	protected $table = 'tipo_empresa';

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