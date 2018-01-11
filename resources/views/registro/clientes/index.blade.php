@extends ('layouts.principal')
@section('titulo')
          <div class="uk-float-left">
               <h4 class="uk-margin-remove">Clientes</h4 class="uk-margin-remove">
          </div>
 		   		<div class="uk-float-right">
			    			<ul class="uk-iconnav">
							    <li><a href="{{ route('cliente.create') }}" uk-icon="icon: plus"></a></li>
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
      <p>Registro de cliente creado exitosamente</p>
  </div>
@endif

<hr>
<div class="uk-grid-collapse uk-child-width-1-2 uk-margin-small-top" uk-grid>
              <div class="uk-card uk-card-default uk-padding-small">
                   <table class="table table-hover">
                   <thead>
                      <tr>
                       <th>Id</th>
                       <th>Código</th>
                       <th>Rif</th>
                       <th>Nombre</th>
                       <th>Acción</th>
                      </tr>    
                   </thead>

                   @foreach($cliente as $clientes)
                   <tbody>
                   <tr>
                      <td>{{$clientes->id}}</td>
                      <td>{{$clientes->codigo }}</td>
                      <td>{{$clientes->rif }}</td>
                      <td>{{$clientes->nombre }}</td>
                                     
                      <td class="text-left">
                                 
                       <a href="{{ route('cliente.show',$clientes->id) }}" title="Ver ficha de Registro" class="uk-icon-link" uk-icon="icon: file" contextmenu="Ver Registro"><i class="fa fa-search "></i }></a> 
                       <a href="{{ route('cliente.edit',$clientes->id) }}"  title="Editar Registro"class="uk-icon-link" uk-icon="icon: file-edit"></a>
                       <a href="{{ route('registro.cliente.destroy',$clientes->id) }}" title="Eliminar Registro" class="uk-icon-link" uk-icon="icon: trash" onclick="return confirm('¿Seguro desea eliminar este registro?')"></a> 
                      </td>
                  </tr>
                  </tbody>
                  @endforeach
                  </table>
                  <?php echo $cliente->render(); ?>
                

          </div>
 @include('registro.clientes.filtrar')  

</div>          
                                    


@endsection
