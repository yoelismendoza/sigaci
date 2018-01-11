@extends ('layouts.principal')
@section('titulo')
   Crear Inventario
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
<?php
 $fecha = date("Y-m-d");
?>  
<div class="uk-width-1-2s  uk-padding-small" style="background-color:  #f0f0f0">
		{!! Form::open(['route' => 'inventario.store', 'method' => 'POST', 'class' => 'uk-grid-stacked']) !!}     
			<?php
			session_start();
			$idusuario = $_SESSION['usuario'];?>
	<fieldset class="uk-fieldset">
		<div class="uk-column-1-4@m">		
		          {!! Form::label('Almacen') !!}
			            {!! Form::select('id_almacen', $almacen,null,['placeholder' => 'SELECCIONE','class' => 'uk-select', 'required']); !!}
		          {!! Form::label('Ejercicio') !!}
			            {!! Form::select('id_ejercicio', $ejercicio,null,['placeholder' => 'SELECCIONE','class' => 'uk-select', 'required']); !!}
		          {!! Form::label('Desde') !!}
			          {!! Form::text('desde',null,['class' => 'uk-input datepicker','maxlength'=>'12','placeholder'=>'Ingrese Desde','required']) !!}  
		           {!! Form::label('Hasta') !!}
			          {!! Form::text('hasta',null,['class' => 'uk-input datepicker','maxlength'=>'12','placeholder'=>'Ingrese hasta','readonly','required']) !!}  
			      	  
			</div>
			<div class="uk-column-1-3@m">  
			  {!! Form::label('Fecha') !!}
			          {!! Form::text('fecha',$fecha,['class' => 'uk-input datepicker','maxlength'=>'12','placeholder'=>'Ingrese fecha','readonly','required']) !!}      
			          {!! Form::label('Estatus') !!}
			            {!! Form::select('id_estatus', [ '1' => 'Activo', '2' => 'Inactivo'],null,['placeholder' => 'SELECCIONE','class' => 'uk-select', 'required']); !!}
			          {!! Form::label('Usuario') !!}
			          {!! Form::text('id_usuario',$idusuario,['id'=>'id_usuario','class'=>'uk-input','readonly']) !!}        
			</div>             
			   <div class="uk-column-1-6 uk-padding-small uk-margin uk-card uk-card-default uk-card-body">
					      
			            {!! Form::label('Material') !!}
			            {!! Form::select('pid_material', $material,null,['placeholder' => 'Seleccione','class' => 'uk-select uk-search-field','id'=>'pid_material']); !!} 
			          
			           {!! Form::label('Cantidad') !!}
			          {!! Form::number('pcantidad',null,['id'=>'pcantidad','class'=>'uk-input','placeholder' => 'Indique Cantidad']) !!}   
			           {!! Form::label('Precio Compra') !!}
			          {!! Form::number('pprecioc',null,['id'=>'pprecioc','class'=>'uk-input','placeholder' => 'Indique Precio de Compra']) !!} 
			           {!! Form::label('Precio Venta') !!}
			          {!! Form::number('ppreciov',null,['id'=>'ppreciov','class'=>'uk-input','placeholder' => 'Indique Precio de Venta']) !!} 

			          <div class="uk-width-1-1 uk-padding-small">
                      <button type="button" id="agregar" class="uk-button uk-button-default">Incluir</button>
           			 </div>
			   </div>
               <div class="uk-grid-collapse uk-child-width-1-1 uk-margin-small-top" uk-grid>
               	<table id="detalles" class="table table-hover">
                  <thead style="background-color: #A9D0F5">
                  	<th>Opciones</th>
                  	<th>Material</th>
                  	<th>Cantidad</th>
                  	<th>Precio Compra</th>
                  	<th>Precio Venta</th>
                  </thead>
                  <tfoot>
                  	<th>Total</th>
                  	<th></th>
                  	<th></th>
                  	<th></th>
                  	<th><h4 id="Cantidad Total">0.00</h4></th>
                  </tfoot>
                  <tbody>
                  	
                  </tbody>
               	</table>
               </div>

 			   <div class="uk-column-1-4 uk-padding-small" id="guardar">  
               		<div class="uk-width-1-1">
			   				{!!Form::submit('Guardar',['class'=>'uk-button uk-button-primary'])!!}
			   		</div>
			<div class="uk-width-1-1">
						   <?php echo link_to_route('inventario.index', $title = 'Cancelar',$parameters = [],['class'=>'uk-button uk-button-primary']); ?>
						</div>
					</div>
	</fieldset>
	</div>
	<input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
		{!! Form::close() !!} 
	
     
@push ('scripts')
<script>
	$(document).ready(function() {
		$('#agregar').click(function() {
			incluir();
		});
	});
	
	
	var contador=0;
	subtotal=[];
	total=0;
	 $('#guardar').hide();

    function incluir()
    {
    	idmaterial = $('#pid_material').val();
    	dmaterial = $('#pid_material option:selected').text();
    	cantidad = $('#pcantidad').val();
    	precioc = $('#pprecioc').val();
    	preciov = $('#ppreciov').val();
     	if(idmaterial!="" && cantidad!="" && cantidad>0  && precioc!="" && precioc>0 && preciov!="" && preciov>0)
    	{
           
           if(contador<11){  
    		subtotal[contador]=cantidad;
    		total = total + cantidad;
    		var fila = '<tr class="selected" id="fila'+contador+'"><td><button type="button"class="btn btn-warning" onclick="eliminar('+contador+');">X</button></td><td><input type="hidden" name="idmaterial[]" value="'+idmaterial+'">'+dmaterial+'</td><td><input type="number" class="uk-input" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" class="uk-input" name="precioc[]" value="'+precioc+'"></td><td><input type="number" class="uk-input" name="preciov[]" value="'+preciov+'"></td>';
    		contador++;
    		limpiar();
    		$("#total").html(total);
    		verificar();
    		$("#detalles").append(fila);
    	}else{ alert("Sólo se permiten 10, incluya el resto por el menu de Inventario")}
    	}
    	else{alert("Error al ingresar item de la cotización");}
    }

	function limpiar()
	{
		$('#pcantidad').val("");
		$('#pprecioc').val("");
		$('#ppreciov').val("");
	}
	function verificar()
	{
		if(total>0){
          $('#guardar').show();
		}else{
         $('#guardar').hide();
		}
	}
	function eliminar(index)
	{
		total = total - subtotal[index];
		$("#total").html("Bs/." + total);
		$("#fila"+index).remove();
		verificar();
	}

	
</script>
@endpush  
@stop


