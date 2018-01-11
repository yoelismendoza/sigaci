@extends ('layouts.principal')
@section('titulo')
   Modificar Registro de Tipo de Empresa
@endsection

@section('content')
<div class="uk-padding-small" uk-grid>
<div class="uk-width-1-2  uk-padding-small" style="background-color:  #f0f0f0">

{!! Form::model($tipoempresa, ['route' => ['tipoempresa.update', $tipoempresa->id], 'method' => 'PUT', 'enctype'=>'multipart/form-data']) !!}        
<?php  //$dimage='/imagenes/parentescos/'.$parentesco->image; ?>   
       @include('tipoempresa.forms.tipoempresa')
			   {!!Form::submit('Guardar',['class'=>'uk-button uk-button-primary'])!!}
			   <?php echo link_to_route('tipoempresa.index', $title = 'Cancelar',$parameters = [],['class'=>'uk-button uk-button-primary']); ?>

{!! Form::close() !!} 
</div>
</div>     

@stop
