@extends ('layouts.principal')
@section('titulo')
  Ficha de Tipo Material
@endsection
@section('content')

{!! Form::model($tipomaterial, ['route' => ['tipomaterial.edit', $tipomaterial->id], 'method' => 'GET', 'enctype'=>'multipart/form-data']) !!}  

<div class="uk-padding-small" uk-grid>
<div class="uk-width-1-2  uk-padding-small" style="background-color:  #f0f0f0">
      <div class="uk-margin">
          {!! Form::label('Descripción') !!}
          {!! Form::text('descripcion',$tipomaterial->descripcion,['id'=>'descripcion','class'=>'uk-input','readonly']) !!}        
       </div>
 
      <div class="uk-margin">
          {!! Form::label('Desde') !!}
          {!! Form::text('desde',$tipomaterial->desde,['class' => 'uk-input datepicker','maxlength'=>'12','readonly']) !!}  
      </div>    
      <div class="uk-margin">
           {!! Form::label('Hasta') !!}
          {!! Form::text('hasta',$tipomaterial->hasta,['class' => 'uk-input datepicker','maxlength'=>'12','readonly']) !!}  
       </div>
      <div class="uk-margin">
          {!! Form::label('Estatus') !!}
            {!! Form::select('id_estatus', [ '1' => 'Activo', '2' => 'Inactivo'],null,['class' => 'uk-select', 'readonly']); !!}
      
       </div>

     <div class="uk-margin">
          {!! Form::label('Usuario') !!}
          {!! Form::text('id_usuario',$tipomaterial->idusuario,['id'=>'id_usuario','class'=>'uk-input','readonly']) !!}        
       </div>
               <?php echo link_to_route('tipomaterial.index', $title = 'Cancelar',$parameters = [],['class'=>'uk-button uk-button-primary']); ?>
             
  </fieldset>
</div>
</div>

{!! Form::close() !!} 

@endsection
