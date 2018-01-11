@extends ('layouts.principal')
@section('titulo')
   Crear Tipo Empresas
@endsection

@section('content')
@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
	<ul>
	 @foreach($errors->all() as $error)
		<li>{{$error}}</li>
	 @endforeach	
	</ul>
</div>
@endif  

<div class="uk-padding-small" uk-grid>
<div class="uk-width-1-2  uk-padding-small" style="background-color:  #f0f0f0">
{!! Form::open(['route' => 'tipoempresa.store', 'method' => 'POST', 'class' => 'uk-form-stacked']) !!}     
			   @include('configuracion.tipoempresa.forms.tipoempresa')
			   {!!Form::submit('Guardar',['class'=>'uk-button uk-button-primary'])!!}
			   <?php echo link_to_route('tipoempresa.index', $title = 'Cancelar',$parameters = [],['class'=>'uk-button uk-button-primary']); ?>
{!! Form::close() !!} 
</div>
</div>     
@stop
