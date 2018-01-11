@extends ('layouts.principal')
@section('titulo')
   Almacen
			    		<div class="uk-float-right">
			    			<ul class="uk-iconnav">
							    <li><a href="{{ route('almacen.create') }}" uk-icon="icon: plus-circle"></a></li>
							   <!-- <li><a href="#" uk-icon="icon: file-edit"></a></li>
							    <li><a href="#" uk-icon="icon: copy"></a></li>
							    <li><a href="#" uk-icon="icon: trash"></a></li>-->
							</ul>
			    		</div>

   @endsection


@section('content')
<?php $message=Session::get('message');?>
@if($message == 'store')
  <div class="alert alert-sucess alert-dismissible" role="alert">
  
    <p>Registro de almacen creado exitosamente</p>
  </div>
@endif

<div class="col-md-12">
                   <hr>
                   <table class="table table-hover">
                   <thead>
                      <tr>
                       <th>Id</th>
                       <th>Descripción</th>
                     
                       <th>Acción</th>
                      </tr>    
                   </thead>

                   @foreach($almacen as $almacens)
                   <tbody>
                   <tr>
                      <td>{{$almacens->id}}</td>
                      <td>{{$almacens->descripcion }}</td>
                  
                      <td class="text-left">
                                 
                       <a href="{{ route('almacen.show',$almacens->id) }}" title="Ver ficha de Registro" class="uk-icon-link" uk-icon="icon: file" contextmenu="Ver Registro"><i class="fa fa-search "></i }></a> 
                       <a href="{{ route('almacen.edit',$almacens->id) }}"  title="Editar Registro"class="uk-icon-link" uk-icon="icon: file-edit"></a>
                       <a href="{{ route('configuracion.almacen.destroy',$almacens->id) }}" title="Eliminar Registro" class="uk-icon-link" uk-icon="icon: trash" onclick="return confirm('¿Seguro desea eliminar este registro?')"></a> 
                      </td>
                  </tr>
                  </tbody>
                  @endforeach
                  </table>
                  <?php echo $almacen->render(); ?>
                

                <div class="text-center">
                   
               
				  <?php 
				  //echo link_to_route('principal.index', $title = 'Atras',null,['class'=>'btn btn-primary']); ?>
                   <hr>
              </div>                 
 </div>


@endsection
