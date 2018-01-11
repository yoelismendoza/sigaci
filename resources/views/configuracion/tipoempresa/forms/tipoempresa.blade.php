<fieldset class="uk-fieldset">
<?php session_start();
      $idusuario = $_SESSION['usuario']; 
	  $desde=date('Y-m-d');?>
      <div class="uk-margin">
          {!! Form::label('Descripción') !!}
          {!! Form::text('descripcion',null,['id'=>'descripcion','class'=>'uk-input','placeholder'=>'Ingrese Descripcion','required']) !!}        
       </div>

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


