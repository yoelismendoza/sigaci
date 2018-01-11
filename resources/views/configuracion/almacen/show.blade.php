@extends ('layouts.principal')
@section('titulo')
  Ficha de Tipo de Cotización
@endsection
@section('content')

{!! Form::model($almacen, ['route' => ['almacen.edit', $almacen->id], 'method' => 'GET', 'enctype'=>'multipart/form-data']) !!}  

<div class="uk-padding-small" uk-grid>
<div class="uk-width-1-2  uk-padding-small" style="background-color:  #f0f0f0">
      <div class="uk-margin">
          {!! Form::label('Descripción') !!}
          {!! Form::text('descripcion',$almacen->descripcion,['id'=>'descripcion','class'=>'uk-input','readonly']) !!}        
       </div>
 
      <div class="uk-margin">
          {!! Form::label('Estatus') !!}
            {!! Form::select('id_estatus', [ '1' => 'Activo', '2' => 'Inactivo'],null,['class' => 'uk-select', 'readonly']); !!}
      
       </div>

     <div class="uk-margin">
          {!! Form::label('Usuario') !!}
          {!! Form::text('id_usuario',$almacen->idusuario,['id'=>'id_usuario','class'=>'uk-input','readonly']) !!}        
       </div>
               <?php echo link_to_route('almacen.index', $title = 'Cancelar',$parameters = [],['class'=>'uk-button uk-button-primary']); ?>
             
  </fieldset>
</div>
</div>

{!! Form::close() !!} 

@endsection
