@extends ('layouts.principal')
@section('titulo')
  Ficha de empresa
@endsection
@section('content')

{!! Form::model($empresa, ['route' => ['empresa.edit', $empresa->id], 'method' => 'GET', 'enctype'=>'multipart/form-data']) !!}  

<div class="uk-padding-small" uk-grid>
<div class="uk-width-1-2  uk-padding-small" style="background-color:  #f0f0f0">
<div class="uk-margin">
       @if(!empty($empresa->logo))
        <img src="{{ asset('img/logo/'.$empresa->logo) }}" alt="" width="100" height="120">      
        @else
        <img src="{{ asset('img/silueta.png') }}" alt="" width="100" height="120">
        @endif
      </div>

      <div class="uk-margin">
          {!! Form::label('Descripción') !!}
          {!! Form::text('descripcion',$empresa->descripcion,['id'=>'descripcion','class'=>'uk-input','readonly']) !!}        
       </div>
     <div class="uk-margin">
          {!! Form::label('Dirección') !!}
          {!! Form::text('direccion',$empresa->direccion,['id'=>'direccion','class'=>'uk-input','readonly']) !!}        
       </div>
     <div class="uk-margin">
          {!! Form::label('Cedula del Representante Legal') !!}
          {!! Form::text('ci_representante',$empresa->ci_representante,['id'=>'ci_representante','class'=>'uk-input','readonly']) !!}        
       </div>
     <div class="uk-margin">
          {!! Form::label('Representante Legal') !!}
          {!! Form::text('representante',$empresa->representante,['id'=>'representante','class'=>'uk-input','readonly']) !!}        
       </div>
     <div class="uk-margin">
          {!! Form::label('Rif') !!}
          {!! Form::text('rif',$empresa->rif,['id'=>'rif','class'=>'uk-input','readonly']) !!}        
       </div>
    <div class="uk-margin">
          {!! Form::label('Nit') !!}
          {!! Form::text('nit',$empresa->nit,['id'=>'nit','class'=>'uk-input','readonly']) !!}        
       </div>
     <div class="uk-margin">
          {!! Form::label('Tipo Empresa') !!}
            {!! Form::select('id_tipoempresa', $tipoempresa,$empresa->id_tipoempresa,['class' => 'uk-select','readonly']); !!}
                     
       </div>

      <div class="uk-margin">
          {!! Form::label('Desde') !!}
          {!! Form::text('desde',$empresa->desde,['class' => 'uk-input datepicker','maxlength'=>'12','readonly']) !!}  
      </div>    
      <div class="uk-margin">
           {!! Form::label('Hasta') !!}
          {!! Form::text('hasta',$empresa->hasta,['class' => 'uk-input datepicker','maxlength'=>'12','readonly']) !!}  
       </div>


      <div class="uk-margin">
          {!! Form::label('Estatus') !!}
            {!! Form::select('id_estatus', [ '1' => 'Activo', '2' => 'Inactivo'],null,['class' => 'uk-select', 'readonly']); !!}
      
       </div>

     <div class="uk-margin">
          {!! Form::label('Usuario') !!}
          {!! Form::text('id_usuario',$empresa->idusuario,['id'=>'id_usuario','class'=>'uk-input','readonly']) !!}        
       </div>
        <?php echo link_to_route('empresa.index', $title = 'Cancelar',$parameters = [],['class'=>'uk-button uk-button-primary']); ?>
            
  </fieldset>
</div>
</div>
{!! Form::close() !!} 

@endsection
