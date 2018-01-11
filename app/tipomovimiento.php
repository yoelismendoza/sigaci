<?php

namespace sigaci;

use Illuminate\Database\Eloquent\Model;

class tipomovimiento extends Model
{
  	protected $table = 'tipomovimiento';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','descripcion','operacion','desde','hasta','id_estatus','id_usuario'];
    protected $guarded  = ['id'];

    public function user(){

    	return $this->belongsTo('sigaci\User');
    }
  //
}
