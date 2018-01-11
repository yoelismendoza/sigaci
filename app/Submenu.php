<?php

namespace sigaci;

use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
     protected $table = 'submenu';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','id_menu','id_submenu','descripcion','id_estatus'];
    protected $guarded  = ['id'];

    public function user(){

    	return $this->belongsTo('sigaci\User');
    }

}
