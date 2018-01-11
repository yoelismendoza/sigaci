<fieldset class="uk-fieldset">
<?php session_start();
      $idusuario = $_SESSION['usuario']; 
	  $desde=date('Y-m-d');?>
      <div class="uk-margin">
          {!! Form::label('Descripción') !!}
          {!! Form::text('descripcion',null,['id'=>'descripcion','class'=>'uk-input','placeholder'=>'Ingrese Descripcion']) !!}        
       </div>
     <div class="uk-margin">
          {!! Form::label('Dirección') !!}
          {!! Form::text('direccion',null,['id'=>'direccion','class'=>'uk-input','placeholder'=>'Ingrese Direccion']) !!}        
       </div>
     <div class="uk-margin">
          {!! Form::label('Cedula del Representante Legal') !!}
          {!! Form::text('ci_representante',null,['id'=>'ci_representante','class'=>'uk-input','placeholder'=>'Ingrese Cédula del Representante Legal']) !!}        
       </div>
     <div class="uk-margin">
          {!! Form::label('Representante Legal') !!}
          {!! Form::text('representante',null,['id'=>'representante','class'=>'uk-input','placeholder'=>'Ingrese Nombre del Representante Legal']) !!}        
       </div>
     <div class="uk-margin">
          {!! Form::label('Rif') !!}
          {!! Form::text('rif',null,['id'=>'rif','class'=>'uk-input','placeholder'=>'Ingrese Rif']) !!}        
       </div>
    <div class="uk-margin">
          {!! Form::label('Nit') !!}
          {!! Form::text('nit',null,['id'=>'nit','class'=>'uk-input','placeholder'=>'Ingrese Nit']) !!}        
       </div>
     <div class="uk-margin">
          {!! Form::label('Tipo Empresa') !!}
            {!! Form::select('id_tipoempresa', $tipoempresa,null,['placeholder' => 'SELECCIONE','class' => 'uk-select', 'required']); !!}
                     
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


