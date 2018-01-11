@extends ('layouts.principal')
@section('titulo')
   Crear material
@endsection

@section('content')
@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
	<ul>
	 @foreach($errors->all() as $error)
		<li>{{$error}}</li>
	 @endforeach	
	</ul>
</div>
@endif  

<div class="uk-width-1-2s  uk-padding-small" style="background-color:  #f0f0f0">
		{!! Form::open(['route' => 'material.store', 'method' => 'POST', 'class' => 'uk-form-stacked']) !!}     
			<?php
			//session_start();
			$idusuario = $_SESSION['usuario'];?>
	<fieldset class="uk-fieldset">
		<div class="uk-column-1-3 uk-padding-small"> 
			      <div class="uk-margin">
			          {!! Form::label('Código') !!}
			          {!! Form::text('codigo',null,['class' => 'uk-input','maxlength'=>'12','placeholder'=>'Ingrese código','required']) !!}  
			      </div>    
 		          <div class="uk-margin">
			          {!! Form::label('Descripcion') !!}
			          {!! Form::text('descripcion',null,['class' => 'uk-input','maxlength'=>'200','placeholder'=>'Ingrese descripción','required']) !!}  
			       </div>
    	          <div class="uk-margin">
			          {!! Form::label('Serial') !!}
			          {!! Form::text('serial',null,['class' => 'uk-input','maxlength'=>'200','placeholder'=>'Ingrese serial','required']) !!}  
			       </div>
  
	   </div>
	   <div class="uk-column-1-4 uk-padding-small"> 
	  		          <div class="uk-margin">
			          {!! Form::label('Precio Compra') !!}
			          {!! Form::text('precio_compra',null,['class' => 'uk-input','maxlength'=>'20','placeholder'=>'Ingrese Precio Compra','requerid']) !!}  
			       </div>
  		          <div class="uk-margin">
			          {!! Form::label('Precio Venta') !!}
			          {!! Form::text('precio_venta',null,['class' => 'uk-input','maxlength'=>'20','placeholder'=>'Ingrese Precio Venta','requerid']) !!}  
			       </div>
  		          <div class="uk-margin">
			          {!! Form::label('Cantidad Inicial') !!}
			          {!! Form::text('cantidad_inicial',null,['class' => 'uk-input','maxlength'=>'12','placeholder'=>'Ingrese Cantidad Inicial','required']) !!}  
			       </div>
		          <div class="uk-margin">
			          {!! Form::label('Existencia') !!}
			          {!! Form::text('cantidad_actual',null,['class' => 'uk-input','maxlength'=>'12','placeholder'=>'Ingrese Cantidad Inicial','readonly']) !!}  
			       </div>

        </div>
        <div class="uk-column-1-3 uk-padding-small"> 
			      <div class="uk-margin">
			          {!! Form::label('Tipo') !!}
		        {!! Form::select('id_tipomaterial', $tipomaterial,null,['placeholder' => 'SELECCIONE','class' => 'uk-select', 'required']); !!}
			    			  
			       </div>
  	
  			      <div class="uk-margin">
			          {!! Form::label('Estatus') !!}
			            {!! Form::select('id_estatus', [ '1' => 'Activo', '2' => 'Inactivo'],null,['placeholder' => 'SELECCIONE','class' => 'uk-select', 'required']); !!}
					  
			       </div>
   			   <div class="uk-margin">
			          {!! Form::label('Usuario') !!}
			          {!! Form::text('id_usuario',$idusuario,['id'=>'id_usuario','class'=>'uk-input','readonly']) !!}        
			       </div>
			</div>             
			  </fieldset>

						   {!!Form::submit('Guardar',['class'=>'uk-button uk-button-primary'])!!}
						   <?php echo link_to_route('material.index', $title = 'Cancelar',$parameters = [],['class'=>'uk-button uk-button-primary']); ?>
		{!! Form::close() !!} 
	</div>
   
@stop
