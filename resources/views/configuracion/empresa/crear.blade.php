@extends ('layouts.principal')
@section('titulo')
   Crear Empresas
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
		{!! Form::open(['route' => 'empresa.store', 'method' => 'POST', 'class' => 'uk-form-stacked']) !!}     
			<?php
			session_start();
			$idusuario = $_SESSION['usuario'];?>
			<fieldset class="uk-fieldset">
				<div class="uk-column-1-2 uk-padding-small"> 
				      {!! Form::label('Nombre') !!}
			          {!! Form::text('nombre',null,['id'=>'nombre','class'=>'uk-input','placeholder'=>'Ingrese Nombre']) !!}        

			          {!! Form::label('Descripción') !!}
			          {!! Form::textarea('descripcion',null,['id'=>'descripcion','class'=>'uk-input','placeholder'=>'Ingrese Descripcion']) !!}        
			       </div>
			     <div class="uk-column-1-1 uk-padding-small"> 
			          {!! Form::label('Dirección') !!}
			          {!! Form::text('direccion',null,['id'=>'direccion','class'=>'uk-input','placeholder'=>'Ingrese Direccion']) !!}        
                 </div>
                 <div class="uk-column-1-2 uk-padding-small"> 
			          {!! Form::label('Cedula del Representante Legal') !!}
			          {!! Form::text('ci_representante',null,['id'=>'ci_representante','class'=>'uk-input','placeholder'=>'Ingrese Cédula del Representante Legal']) !!}        
			          {!! Form::label('Representante Legal') !!}
			          {!! Form::text('representante',null,['id'=>'representante','class'=>'uk-input','placeholder'=>'Ingrese Nombre del Representante Legal']) !!}  
			       </div>      
                  <div class="uk-column-1-2 uk-padding-small"> 
			          {!! Form::label('Rif') !!}
			          {!! Form::text('rif',null,['id'=>'rif','class'=>'uk-input','placeholder'=>'Ingrese Rif']) !!}        

			          {!! Form::label('Nit') !!}
			          {!! Form::text('nit',null,['id'=>'nit','class'=>'uk-input','placeholder'=>'Ingrese Nit']) !!}        
			       </div>
					<div class="uk-column-1-3 uk-padding-small"> 
			          {!! Form::label('Tipo Empresa') !!}
			            {!! Form::select('id_tipoempresa', $tipoempresa,null,['placeholder' => 'SELECCIONE','class' => 'uk-select', 'required']); !!}
			                     
			          {!! Form::label('Desde') !!}
			          {!! Form::text('desde',null,['class' => 'uk-input datepicker','maxlength'=>'12','placeholder'=>'Ingrese Desde','required']) !!}  

			           {!! Form::label('Hasta') !!}
			          {!! Form::text('hasta',null,['class' => 'uk-input datepicker','maxlength'=>'12','placeholder'=>'Ingrese hasta','readonly','required']) !!}  
			       </div>
					<div class="uk-column-1-2 uk-padding-small"> 
                      {!! Form::label('logo','Logo'); !!}
			          {!! Form::file('logo', null,['class' => 'form-control']); !!}
                   </div>
   
			      <div class="uk-column-1-2 uk-padding-small"> 
			          {!! Form::label('Estatus') !!}
			            {!! Form::select('id_estatus', [ '1' => 'Activo', '2' => 'Inactivo'],null,['placeholder' => 'SELECCIONE','class' => 'uk-select', 'required']); !!}
					  
			          {!! Form::label('Usuario') !!}
			          {!! Form::text('id_usuario',$idusuario,['id'=>'id_usuario','class'=>'uk-input','readonly']) !!}        
			       </div>
			             
			  </fieldset>
<div class="uk-column-1-2 uk-padding-small"> 
						   {!!Form::submit('Guardar',['class'=>'uk-button uk-button-primary'])!!}
						   <?php echo link_to_route('empresa.index', $title = 'Cancelar',$parameters = [],['class'=>'uk-button uk-button-primary']); ?>
		{!! Form::close() !!} 
	</div>
 </div> 
@stop
