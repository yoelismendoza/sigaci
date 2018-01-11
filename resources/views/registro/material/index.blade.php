@extends ('layouts.principal')
@section('titulo')
          <div class="uk-float-left">
               <h4 class="uk-margin-remove">Materiales</h4 class="uk-margin-remove">
          </div>
 		   		<div class="uk-float-right">
			    			<ul class="uk-iconnav">
							    <li><a href="{{ route('material.create') }}" uk-icon="icon: plus-circle"></a></li>
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
      <p>Registro de material creado exitosamente</p>
  </div>
@endif

<hr>
<div class="uk-grid-collapse uk-child-width-1-2 uk-margin-small-top" uk-grid>
              <div class="uk-card uk-card-default uk-padding-small">
                   <table class="table table-hover">
                   <thead>
                      <tr>
                       <th>Id</th>
                       <th>Codigo</th>
                       <th>Descripción</th>
                       <th>Precio</th>
                       <th>Acción</th>
                      </tr>    
                   </thead>

                   @foreach($material as $materials)
                   <tbody>
                   <tr>
                      <td>{{$materials->id}}</td>
                      <td>{{$materials->codigo }}</td>
                      <td>{{$materials->descripcion }}</td>
                      <td>{{$materials->precio }}</td>                    
                      <td class="text-left">
                                 
                       <a href="{{ route('material.show',$materials->id) }}" title="Ver ficha de Registro" class="uk-icon-link" uk-icon="icon: file" contextmenu="Ver Registro"><i class="fa fa-search "></i }></a> 
                       <a href="{{ route('material.edit',$materials->id) }}"  title="Editar Registro"class="uk-icon-link" uk-icon="icon: file-edit"></a>
                       <a href="{{ route('registro.material.destroy',$materials->id) }}" title="Eliminar Registro" class="uk-icon-link" uk-icon="icon: trash" onclick="return confirm('¿Seguro desea eliminar este registro?')"></a> 
                      </td>
                  </tr>
                  </tbody>
                  @endforeach
                  </table>
                  <?php echo $material->render(); ?>
                

          </div>
            <div class="uk-card uk-card-muted uk-padding-small">
                  <label>Filtrar Registros</label>
                 {!! Form::open(['route' => 'material.index', 'method' => 'GET', 'class'=>'uk-form-danger']) !!} 
                  <label>Código</label><input type="text" name="codigo" class="uk-input" size="12">
                  <label>Descripción</label><input type="text" name="descripcion" class="uk-input" size="12">
                  <label>Tipo</label>
                  {!! Form::select('idtipomaterial', $tipomaterial,null,['placeholder' => 'SELECCIONE','class' => 'uk-select']); !!}
                  {!!Form::submit('Aplicar',['class'=>'uk-button uk-button-danger'])!!}         







                {!! Form::close() !!} 
            </div>
  

</div>          
                                    


@endsection
