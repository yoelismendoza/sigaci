
@extends ('layouts.principal')
@section('titulo')
          <div class="uk-float-left">
               <h4 class="uk-margin-remove">Inventario</h4 class="uk-margin-remove">
          </div>
 		   		<div class="uk-float-right">
			    			<ul class="uk-iconnav">
							    <li><a href="{{ route('inventario.create') }}" uk-icon="icon: plus-circle"></a></li>
							   <!-- <li><a href="#" uk-icon="icon: file-edit"></a></li>
							    <li><a href="#" uk-icon="icon: copy"></a></li>
							    <li><a href="#" uk-icon="icon: trash"></a></li>-->
							</ul>
		  		</div>

   @endsection


@section('content')
<?php $id=0; 
$id_almacen=0;
$id_ejercicio=0;
$desde="";
$message=Session::get('message'); $texto=Session::get('texto');?>
@if($message == 'store')
  <div class="alert alert-sucess alert-dismissible" role="alert">
      <p>{{ $texto }}</p>
  </div>
@endif

<hr>
<div class="uk-grid-collapse uk-child-width-1-2 uk-margin-small-top" uk-grid>
              <div class="uk-card uk-card-default uk-padding-small">
                   <table class="table table-hover">
                   <thead>
                      <tr>
                       <th>Id</th>
                       <th>Almacen</th>
                       <th>Desde</th>
                       <th>Hasta</th>
                       <th>Acción</th>
                      </tr>    
                   </thead>

                   @foreach($inventario as $inventarios)
                   <tbody>
                   <tr>
                      <td>{{$inventarios->id}}</td>
                      <td>{{$inventarios->id_almacen}}</td>
                      <td>{{$inventarios->desde }}</td>
                      <td>{{$inventarios->hasta }}</td>
                      <?php 
                          $id = $inventarios->id;
                          $id_almacen=$inventarios->id_almacen;
                          $id_ejercicio=$inventarios->id_ejercicio;
                          $desde=$inventarios->desde;
                      ?>
                                     
                      <td class="text-left">
                                 
                       <a href="{{ route('inventario.show',$inventarios->id) }}" title="Ver ficha de Registro" class="uk-icon-link" uk-icon="icon: file" contextmenu="Ver Registro"><i class="fa fa-search "></i }></a> 
                       <a href="{{ route('registro.inventario.destroy',$inventarios->id) }}" title="Eliminar Registro" class="uk-icon-link" uk-icon="icon: trash" onclick="return confirm('¿Seguro desea eliminar este registro?')"></a>
                      
                      <a href="#popup"  title="Incluir Material al Inventario"class="uk-icon-link" uk-icon="icon:  commenting"></a>

                    </td>
                  </tr>
                  </tbody>
                  @endforeach
                  </table>
                  <?php echo $inventario->render(); ?>
                

          </div>
 

</div>          
@if($id_almacen>0)
 @include('registro.inventario.modal')
@endif 
@endsection
