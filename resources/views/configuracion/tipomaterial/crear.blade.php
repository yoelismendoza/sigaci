@extends ('layouts.principal')
@section('titulo')
   Crear Tipo Material
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

<div class="uk-padding-small" uk-grid>
	<div class="uk-width-1-2  uk-padding-small" style="background-color:  #f0f0f0">
		{!! Form::open(['route' => 'tipomaterial.store', 'method' => 'POST', 'class' => 'uk-form-stacked']) !!}     
			<?php
			session_start();
			$idusuario = $_SESSION['usuario'];?>
			<fieldset class="uk-fieldset">
				<div class="uk-column-1-1 uk-padding-small"> 
			      
			          {!! Form::label('Descripción') !!}
			          {!! Form::text('descripcion',null,['id'=>'descripcion','class'=>'uk-input','placeholder'=>'Ingrese Descripcion']) !!}        
			       </div>
			      <div class="uk-column-1-2 uk-padding-small"> 
			          {!! Form::label('Desde') !!}
			          {!! Form::text('desde',null,['class' => 'uk-input datepicker','maxlength'=>'12','placeholder'=>'Ingrese Desde','required']) !!}  
			      
			           {!! Form::label('Hasta') !!}
			          {!! Form::text('hasta',null,['class' => 'uk-input datepicker','maxlength'=>'12','placeholder'=>'Ingrese hasta','readonly','required']) !!}  
			      </div>
			      <div class="uk-column-1-2 uk-padding-small"> 
			          {!! Form::label('Estatus') !!}
			            {!! Form::select('id_estatus', [ '1' => 'Activo', '2' => 'Inactivo'],null,['placeholder' => 'SELECCIONE','class' => 'uk-select', 'required']); !!}
					  
			       
			          {!! Form::label('Usuario') !!}
			          {!! Form::text('id_usuario',$idusuario,['id'=>'id_usuario','class'=>'uk-input','readonly']) !!}        
			       </div>
			             
			  </fieldset>

						   {!!Form::submit('Guardar',['class'=>'uk-button uk-button-primary'])!!}
						   <?php echo link_to_route('tipomaterial.index', $title = 'Cancelar',$parameters = [],['class'=>'uk-button uk-button-primary']); ?>
		{!! Form::close() !!} 
	</div>
</div>     
@stop
