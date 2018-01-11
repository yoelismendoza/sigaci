<?php

namespace sigaci;

use Illuminate\Database\Eloquent\Model;

class ejercicio extends Model
{
	protected $table = 'ejercicio';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','desde','hasta','id_estatus','id_usuario'];
    protected $guarded  = ['id'];

    public function user(){

    	return $this->belongsTo('sigaci\User');
    }
}
