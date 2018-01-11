@extends ('layouts.principal')
@section('titulo')
          <div class="uk-float-left">
               <h4 class="uk-margin-remove">Listado de Cotizaciones</h4 class="uk-margin-remove">
               
          </div>
 		   		<div class="uk-float-right">
			    			<ul class="uk-iconnav">
							    <li><a href="{{ route('cotizacion.create') }}" uk-icon="icon: plus-circle"></a></li>
							  
							</ul>
		  		</div>

@endsection
<?php 
   $message=Session::get('message'); 
   $texto=Session::get('texto');
?>
@section('content')
 

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
                       <th>Fecha</th>
                       <th>Cliente</th>
                       <th>Validez</th>
                       <th>Total</th>
                       <th>Acción</th>
                      </tr>    
                   </thead>
                   <?php $id=0; ?>
                   @foreach($cotizacion as $cotizacions)
                   <?php $id = $cotizacions->id;?>
                   <tbody>
                   <tr>
                      <td>{{$cotizacions->id}}</td>
                      <td>{{$cotizacions->fecha}}</td>
                      <td>{{$cotizacions->nombre }}</td>
                      <td align="center">{{$cotizacions->validez }}</td>
                      <td><?php echo number_format($cotizacions->total,'2',',','.')?></td>
                                                        
                      <td class="text-left">
                                 
                       <a href="{{ route('cotizacion.show',$cotizacions->id) }}" title="Ver ficha de Registro" class="uk-icon-link" uk-icon="icon:file" contextmenu="Ver Registro"><i class="fa fa-search "></i }></a> 
                        <a href="{{ route('procesar.cotizacion.destroy',$cotizacions->id) }}" title="Eliminar Registro" class="uk-icon-link" uk-icon="icon: trash" onclick="return confirm('¿Seguro desea eliminar este registro?')"></a>
                      
                      <a href="#popup"  title="Incluir Material/Productos al cotizacion"class="uk-icon-link" uk-icon="icon:  commenting"></a>
                      <a href="#popup2"  title="Duplicar cotizacion"class="uk-icon-link" uk-icon="icon: comments"></a>
<a href="{{ route('procesar.cotizacion.pdf') }}" title="PDF" class="uk-icon-link" uk-icon="icon:file" contextmenu="PDF"><i class="fa fa-search "></i }></a>
                    </td>
                  </tr>

                  </tbody>
                  
                  @endforeach
                  </table>
                  <?php echo $cotizacion->render(); ?>
                

          </div>
  @if($id>0)        
    @include('procesar.cotizacion.modal')
    @include('procesar.cotizacion.duplicar')
  @endif
</div>          
       


@endsection
