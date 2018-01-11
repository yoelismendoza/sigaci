@extends ('layouts.principal')
@section('titulo')
          <div class="uk-float-left">
               <h4 class="uk-margin-remove">Proveedores</h4 class="uk-margin-remove">
          </div>
 		   		<div class="uk-float-right">
			    			<ul class="uk-iconnav">
							    <li><a href="{{ route('proveedor.create') }}" uk-icon="icon: plus"></a></li>
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
      <p>Registro de proveedor creado exitosamente</p>
  </div>
@endif

<hr>
<div class="uk-grid-collapse uk-child-width-1-2 uk-margin-small-top" uk-grid>
              <div class="uk-card uk-card-default uk-padding-small">
                   <table class="table table-hover">
                   <thead>
                      <tr>
                       <th>Id</th>
                       <th>Rif</th>
                       <th>Nombre</th>
                       <th>Acción</th>
                      </tr>    
                   </thead>

                   @foreach($proveedor as $proveedors)
                   <tbody>
                   <tr>
                      <td>{{$proveedors->id}}</td>
                      <td>{{$proveedors->rif }}</td>
                      <td>{{$proveedors->nombre }}</td>
                                     
                      <td class="text-left">
                                 
                       <a href="{{ route('proveedor.show',$proveedors->id) }}" title="Ver ficha de Registro" class="uk-icon-link" uk-icon="icon: file" contextmenu="Ver Registro"><i class="fa fa-search "></i }></a> 
                       <a href="{{ route('proveedor.edit',$proveedors->id) }}"  title="Editar Registro"class="uk-icon-link" uk-icon="icon: file-edit"></a>
                       <a href="{{ route('registro.proveedor.destroy',$proveedors->id) }}" title="Eliminar Registro" class="uk-icon-link" uk-icon="icon: trash" onclick="return confirm('¿Seguro desea eliminar este registro?')"></a> 
                      </td>
                  </tr>
                  </tbody>
                  @endforeach
                  </table>
                  <?php echo $proveedor->render(); ?>
                

          </div>
            <div class="uk-card uk-card-muted uk-padding-small">
                  <label>Filtrar Registros</label>
                 {!! Form::open(['route' => 'proveedor.index', 'method' => 'GET', 'class'=>'uk-form-danger']) !!} 
                  <label>Rif</label><input type="text" name="rif" class="uk-input" size="12">
                  <label>Nombre</label><input type="text" name="nombre" class="uk-input" size="12">
                  {!!Form::submit('Aplicar',['class'=>'uk-button uk-button-danger'])!!}         

                {!! Form::close() !!} 
            </div>
  

</div>          
                                    


@endsection
