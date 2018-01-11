@extends ('layouts.principal')
@section('titulo')
   Modificar Registro de proveedor
@endsection

@section('content')
<div class="uk-padding-small" uk-grid>
<div class="uk-width-1-2  uk-padding-small" style="background-color:  #f0f0f0">

{!! Form::model($proveedor, ['route' => ['proveedor.update', $proveedor->id], 'method' => 'PUT', 'enctype'=>'multipart/form-data']) !!}        
<?php  //$dimage='/imagenes/parentescos/'.$parentesco->image; ?>   
       <fieldset class="uk-fieldset">
<?php session_start();
      $idusuario = $_SESSION['usuario']; 
	  $desde=date('Y-m-d');?>

      <div class="uk-margin">
          {!! Form::label('Rif') !!}
          {!! Form::text('rif',null,['class' => 'uk-input datepicker','maxlength'=>'12','placeholder'=>'Ingrese rif','readonly']) !!}  
      </div>    
       <div class="uk-margin">
                {!! Form::label('nit') !!}
                {!! Form::text('nit',null,['class' => 'uk-input','maxlength'=>'200','placeholder'=>'Ingrese nit']) !!}  
       </div>

      <div class="uk-margin">
           {!! Form::label('Nombre') !!}
          {!! Form::text('nombre',null,['class' => 'uk-input','maxlength'=>'200','placeholder'=>'Ingrese nombre','required']) !!}  
       </div>

      <div class="uk-margin">
           {!! Form::label('Direccion') !!}
          {!! Form::text('direccion',null,['class' => 'uk-input','maxlength'=>'200','placeholder'=>'Ingrese direccion','required']) !!}  
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
