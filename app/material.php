<?php

namespace sigaci;

use Illuminate\Database\Eloquent\Model;

class material extends Model
{
    	protected $table = 'material';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','codigo','precio_compra','precio_venta','serial','descripcion','id_tipomaterial','cantidad_inicial','cantidad_actual','id_estatus','id_usuario'];
    protected $guarded  = ['id'];

    public function user(){

    	return $this->belongsTo('sigaci\User');
    }

    public function scopeCodigo($query,$codigo)
    {
        //dd("scope: ".$codigo);
        $query -> where('codigo','LIKE',$codigo.'%');

    }

    public function scopeDescripcion($query,$des)
    {
        //dd("scope: ".$cedula);
        $query -> where("descripcion","LIKE","%$des%");
    }

   public function scopeTipomaterial($query,$tipo)
    {
        //dd("scope: ".$cedula);
        $query -> where("id_tipomaterial","=","$tipo");
    }


   public function scopeCodigoDescripcion($query,$codigo,$descripcion)
    {
        //dd("scope: ".$codigo);
        $query -> where('codigo','LIKE',$codigo.'%')
               -> where("descripcion","LIKE","%$descripcion%");   
                 
    }
    public function scopeCodigoTipo($query,$codigo,$tipo)
    {
        //dd("scope: ".$codigo.$tipo); 
        $query -> where('id_tipomaterial','=',$tipo) 
              -> where('codigo','LIKE',$codigo.'%');   
                 
    }

  public function scopeTipoDescripcion($query,$tipo,$descripcion)
    {
        //dd("scope: ".$codigo);
        $query -> where('id_tipomaterial','=',$tipo)
               -> where("descripcion","LIKE","%$descripcion%");   
                 
    }
 
   public function scopeCodigoDestipo($query,$codigo,$descripcion,$tipo)
    {
        //dd("scope: ".$codigo);
        $query -> where('codigo','LIKE',$codigo.'%')
               -> where('id_tipomaterial','=',$tipo)
               -> where("descripcion","LIKE","%$descripcion%");   
                 
    }


}

