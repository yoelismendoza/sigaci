@extends ('layouts.principal')
@section('titulo')
  Ficha de material
@endsection
@section('content')
<div class="uk-width-1-2s  uk-padding-small" style="background-color:  #f0f0f0">
{!! Form::model($material, ['route' => ['material.edit', $material->id], 'method' => 'GET', 'enctype'=>'multipart/form-data']) !!}  


<div class="uk-column-1-3 uk-padding-small">
     <div class="uk-margin">
          {!! Form::label('Codigo') !!}
          {!! Form::text('codigo',$material->codigo,['class' => 'uk-input','maxlength'=>'20','readonly']) !!}  
      </div>    
       <div class="uk-margin">
          {!! Form::label('Descripcion') !!}
          {!! Form::text('descripcion',$material->descripcion,['class' => 'uk-input','maxlength'=>'200','readonly']) !!}  
      </div>    
      <div class="uk-margin">
          {!! Form::label('Serial') !!}
          {!! Form::text('serial',$material->serial,['class' => 'uk-input','maxlength'=>'200','readonly']) !!}  
      </div>  

</div>
<div class="uk-column-1-4 uk-padding-small">      
                <div class="uk-margin">
                {!! Form::label('Precio Compra') !!}
                {!! Form::text('precio_compra',null,['class' => 'uk-input','maxlength'=>'20','placeholder'=>'Ingrese Precio Compra','readonly']) !!}  
             </div>
              <div class="uk-margin">
                {!! Form::label('Precio Venta') !!}
                {!! Form::text('precio_venta',null,['class' => 'uk-input','maxlength'=>'20','placeholder'=>'Ingrese Precio Venta','readonly']) !!}  
             </div>
    <div class="uk-margin">
          {!! Form::label('Cantidad Inicial') !!}
          {!! Form::text('cantidad',$material->cantidad_inicial,['class' => 'uk-input','maxlength'=>'200','readonly']) !!}  
      </div>  
      <div class="uk-margin">
          {!! Form::label('Existencia') !!}
          {!! Form::text('cantidad_actual',$material->cantidad_actual,['class' => 'uk-input','maxlength'=>'200','readonly']) !!}  
      </div>  
 
</div>
<div class="uk-column-1-3 uk-padding-small">
      <div class="uk-margin">
          {!! Form::label('Estatus') !!}
            {!! Form::select('id_estatus', [ '1' => 'Activo', '2' => 'Inactivo'],null,['class' => 'uk-select', 'readonly']); !!}
      
       </div>
    <div class="uk-margin">
          {!! Form::label('Tipo') !!}
            {!! Form::select('id_tipomaterial', $tipomaterial,$material->id_tipomaterial,['placeholder' => 'SELECCIONE','class' => 'uk-select', 'readonly']); !!}
       </div>

     <div class="uk-margin">
          {!! Form::label('Usuario') !!}
          {!! Form::text('id_usuario',$material->idusuario,['id'=>'id_usuario','class'=>'uk-input','readonly']) !!}        
       </div>
     </div>
               <?php echo link_to_route('material.index', $title = 'Cancelar',$parameters = [],['class'=>'uk-button uk-button-primary']); ?>
             
  </fieldset>
</div>


{!! Form::close() !!} 

@endsection
