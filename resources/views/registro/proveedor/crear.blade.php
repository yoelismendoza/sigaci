@extends ('layouts.principal')
@section('titulo')
   Crear proveedor
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
		{!! Form::open(['route' => 'proveedor.store', 'method' => 'POST', 'class' => 'uk-form-stacked']) !!}     
			<?php
			session_start();
			$idusuario = $_SESSION['usuario'];?>
			<fieldset class="uk-fieldset">
			      <div class="uk-margin">
			          {!! Form::label('Rif') !!}
			          {!! Form::text('rif',null,['class' => 'uk-input','maxlength'=>'20','placeholder'=>'Ingrese Rif','required']) !!}  
			      </div>    
			      <div class="uk-margin">
			          {!! Form::label('Nit') !!}
			          {!! Form::text('nit',null,['class' => 'uk-input','maxlength'=>'20','placeholder'=>'Ingrese Nit']) !!}  
			      </div>    

 		          <div class="uk-margin">
			          {!! Form::label('Nombre') !!}
			          {!! Form::text('nombre',null,['class' => 'uk-input','maxlength'=>'200','placeholder'=>'Ingrese Nombre','required']) !!}  
			       </div>
		          <div class="uk-margin">
			          {!! Form::label('Dirección') !!}
			          {!! Form::text('direccion',null,['class' => 'uk-input','maxlength'=>'200','placeholder'=>'Ingrese Dirección','required']) !!}  
			       </div>
  		          <div class="uk-margin">
			          {!! Form::label('Telefono') !!}
			          {!! Form::text('telefono',null,['class' => 'uk-input','maxlength'=>'20','pattern'=>'[0-9]{11}','placeholder'=>'Ingrese Telefono 0000-0000000','requerid']) !!}  
			       </div>
			      <div class="uk-margin">
			          {!! Form::label('Email') !!}
			          {!! Form::email('email',null,['class' => 'uk-input',"pattern"=>"^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$",'maxlength'=>'100','placeholder'=>'Ingrese Email']) !!}  
			       </div>
	
  			      <div class="uk-margin">
			          {!! Form::label('Estatus') !!}
			            {!! Form::select('id_estatus', [ '1' => 'Activo', '2' => 'Inactivo'],null,['placeholder' => 'SELECCIONE','class' => 'uk-select', 'required']); !!}
					  
			       </div>
     
				   <div class="uk-margin">
			          {!! Form::label('Usuario') !!}
			          {!! Form::text('id_usuario',$idusuario,['id'=>'id_usuario','class'=>'uk-input','readonly']) !!}        
			       </div>
			             
			  </fieldset>

						   {!!Form::submit('Guardar',['class'=>'uk-button uk-button-primary'])!!}
						   <?php echo link_to_route('proveedor.index', $title = 'Cancelar',$parameters = [],['class'=>'uk-button uk-button-primary']); ?>
		{!! Form::close() !!} 
	</div>
</div>     
@stop
