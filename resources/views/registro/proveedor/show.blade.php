@extends ('layouts.principal')
@section('titulo')
  Ficha de proveedor
@endsection
@section('content')

{!! Form::model($proveedor, ['route' => ['proveedor.edit', $proveedor->id], 'method' => 'GET', 'enctype'=>'multipart/form-data']) !!}  

<div class="uk-padding-small" uk-grid>
<div class="uk-width-1-2  uk-padding-small" style="background-color:  #f0f0f0">
     <div class="uk-margin">
          {!! Form::label('Rif') !!}
          {!! Form::text('rif',$proveedor->rif,['class' => 'uk-input','maxlength'=>'20','readonly']) !!}  
      </div>    
     <div class="uk-margin">
          {!! Form::label('Nit') !!}
          {!! Form::text('nit',$proveedor->nit,['class' => 'uk-input','maxlength'=>'20','readonly']) !!}  
      </div>    
       <div class="uk-margin">
          {!! Form::label('Nombre') !!}
          {!! Form::text('nombre',$proveedor->nombre,['class' => 'uk-input','maxlength'=>'200','readonly']) !!}  
      </div>    
      <div class="uk-margin">
          {!! Form::label('Dirección') !!}
          {!! Form::text('direccion',$proveedor->direccion,['class' => 'uk-input','maxlength'=>'200','readonly']) !!}  
      </div>    
     <div class="uk-margin">
          {!! Form::label('Telefono') !!}
          {!! Form::text('telefono',$proveedor->telefono,['class' => 'uk-input','maxlength'=>'20','readonly']) !!}  
      </div>    
     <div class="uk-margin">
          {!! Form::label('Email') !!}
          {!! Form::text('email',$proveedor->email,['class' => 'uk-input','maxlength'=>'20','readonly']) !!}  
      </div>    

      <div class="uk-margin">
          {!! Form::label('Estatus') !!}
            {!! Form::select('id_estatus', [ '1' => 'Activo', '2' => 'Inactivo'],null,['class' => 'uk-select', 'readonly']); !!}
      
       </div>
   
     <div class="uk-margin">
          {!! Form::label('Usuario') !!}
          {!! Form::text('id_usuario',$proveedor->idusuario,['id'=>'id_usuario','class'=>'uk-input','readonly']) !!}        
       </div>
          <?php echo link_to_route('proveedor.index', $title = 'Cancelar',$parameters = [],['class'=>'uk-button uk-button-primary']); ?>
             
  </fieldset>
</div>
</div>

{!! Form::close() !!} 

@endsection
