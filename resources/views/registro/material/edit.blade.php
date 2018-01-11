@extends ('layouts.principal')
@section('titulo')
   Modificar Registro de material
@endsection

@section('content')

<div class="uk-width-1-2s  uk-padding-small" style="background-color:  #f0f0f0">

{!! Form::model($material, ['route' => ['material.update', $material->id], 'method' => 'PUT', 'enctype'=>'multipart/form-data']) !!}        
<?php  //$dimage='/imagenes/parentescos/'.$parentesco->image; ?>   
       <fieldset class="uk-fieldset">
<?php session_start();
      $idusuario = $_SESSION['usuario']; 
	  $desde=date('Y-m-d');?>
    <div class="uk-column-1-3 uk-padding-small">
      <div class="uk-margin">
          {!! Form::label('Codigo') !!}
          {!! Form::text('codigo',null,['class' => 'uk-input datepicker','maxlength'=>'12','placeholder'=>'Ingrese Codigo','readonly']) !!}  
      </div>    
      <div class="uk-margin">
           {!! Form::label('Descripcion') !!}
          {!! Form::text('descripcion',null,['class' => 'uk-input','maxlength'=>'200','placeholder'=>'Ingrese Descripcion','required']) !!}  
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
                {!! Form::text('cantidad_inicial',null,['class' => 'uk-input','maxlength'=>'20','placeholder'=>'Ingrese Cantidad Inicial','required']) !!}  
             </div>
              <div class="uk-margin">
          {!! Form::label('Existencia') !!}
          {!! Form::text('cantidad_actual',$material->cantidad_actual,['class' => 'uk-input','maxlength'=>'200','readonly']) !!}  
      </div>  
     
</div>
<div class="uk-column-1-3 uk-padding-small">
      <div class="uk-margin">
          {!! Form::label('Estatus') !!}
            {!! Form::select('id_estatus', [ '1' => 'Activo', '2' => 'Inactivo'],null,['placeholder' => 'SELECCIONE','class' => 'uk-select', 'required']); !!}
		  
       </div>
   <div class="uk-margin">
          {!! Form::label('Tipo') !!}
            {!! Form::select('id_tipomaterial', $tipomaterial,$material->id_tipomaterial,['placeholder' => 'SELECCIONE','class' => 'uk-select', 'required']); !!}
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
