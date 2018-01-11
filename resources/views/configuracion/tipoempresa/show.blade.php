@extends ('layouts.principal')
@section('titulo')
  Ficha de tipoempresa
@endsection
@section('content')

{!! Form::model($tipoempresa, ['route' => ['tipoempresa.edit', $tipoempresa->id], 'method' => 'GET', 'enctype'=>'multipart/form-data']) !!}  

<div class="uk-padding-small" uk-grid>
<div class="uk-width-1-2  uk-padding-small" style="background-color:  #f0f0f0">
<fieldset class="uk-fieldset">
      <div class="uk-margin">
          {!! Form::label('Id') !!}
          {!! Form::text('id',null,['id'=>'id','class'=>'uk-input', 'readonly']) !!}        
       </div>

      <div class="uk-margin">
          {!! Form::label('Descripcion') !!}
          {!! Form::text('descripcion',null,['id'=>'descripcion','class'=>'uk-input','readonly']) !!}        
          
       </div>
      <div class="uk-margin">
          {!! Form::label('Desde') !!}
          {!! Form::text('desde',null,['id'=>'desde','class'=>'uk-input','readonly']) !!}        
       </div>
      <div class="uk-margin">
          {!! Form::label('Hasta') !!}
          {!! Form::text('hasta',null,['id'=>'hasta','class'=>'uk-input','readonly']) !!}        
       </div>
         <?php echo link_to_route('tipoempresa.index', $title = 'Cancelar',$parameters = [],['class'=>'uk-button uk-button-primary']); ?>
</fieldset>
</div>
</div>
{!! Form::close() !!} 

@endsection
