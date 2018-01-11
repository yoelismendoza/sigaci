@extends ('layouts.principal')
@section('titulo')
   Modificar Registro de Ejercicio
@endsection

@section('content')
<div class="uk-padding-small" uk-grid>
<div class="uk-width-1-2  uk-padding-small" style="background-color:  #f0f0f0">

{!! Form::model($ejercicio, ['route' => ['ejercicio.update', $ejercicio->id], 'method' => 'PUT', 'enctype'=>'multipart/form-data']) !!}        
<?php  //$dimage='/imagenes/parentescos/'.$parentesco->image; ?>   
       <fieldset class="uk-fieldset">
<?php session_start();
      $idusuario = $_SESSION['usuario']; 
	  $desde=date('Y-m-d');?>

      <div class="uk-margin">
          {!! Form::label('Desde') !!}
          {!! Form::text('desde',null,['class' => 'uk-input datepicker','maxlength'=>'12','placeholder'=>'Ingrese Desde','required']) !!}  
      </div>    
      <div class="uk-margin">
           {!! Form::label('Hasta') !!}
          {!! Form::text('hasta',null,['class' => 'uk-input datepicker','maxlength'=>'12','placeholder'=>'Ingrese hasta','readonly','required']) !!}  
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
			   <?php echo link_to_route('ejercicio.index', $title = 'Cancelar',$parameters = [],['class'=>'uk-button uk-button-primary']); ?>

{!! Form::close() !!} 
</div>
</div>     

@stop
