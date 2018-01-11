@extends ('layouts.principal')
@section('titulo')
          <div class="uk-float-left">
               <h4 class="uk-margin-remove">Listado de movimientos</h4 class="uk-margin-remove">
               
          </div>
 		   		<div class="uk-float-right">
			    			<ul class="uk-iconnav">
							    <li><a href="{{ route('movimientos.create') }}" uk-icon="icon: plus-circle"></a></li>
							  
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
                       <th>Detalle</th>
                       <th>tipo</th>
                       <th>Acción</th>
                      </tr>    
                   </thead>

                   @foreach($movimientos as $movimientoss)
                   <tbody>
                   <tr>
                      <td>{{$movimientoss->id}}</td>
                      <td>{{$movimientoss->fecha}}</td>
                      <td>{{$movimientoss->detalle }}</td>
                      <td align="center">{{$movimientoss->tipo }}</td>
                      
                                                        
                      <td class="text-left">
                                 
                       <a href="{{ route('movimientos.show',$movimientoss->id) }}" title="Ver ficha de Registro" class="uk-icon-link" uk-icon="icon:file" contextmenu="Ver Registro"><i class="fa fa-search "></i }></a> 
                  

                    </td>
                  </tr>

                  </tbody>
                  
                  @endforeach
                  </table>
                  <?php echo $movimientos->render(); ?>
                

          </div>
  @include('procesar.movimientos.search')

</div>          
       


@endsection
