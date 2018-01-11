@extends ('layouts.principal')
@section('titulo')
   Crear cotización
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


<div class="uk-width-1-2s  uk-padding-small" style="background-color:  #f0f0f0">

		{!! Form::open(['route' => 'cotizacion.store', 'method' => 'POST', 'class' => 'uk-grid-stacked','autocomplete'=>'off']) !!}     
		<?php
		session_start();
		$idusuario = $_SESSION['usuario'];
		$fechad = date("Y-m-d");?>
		<fieldset class="uk-fieldset">
				<div class="uk-column-1-2 uk-padding-small"> 
                      {!! Form::label('Cliente') !!}	
			           {!! Form::select('id_cliente', $cliente,null,['placeholder' => 'Seleccione','class' => 'uk-select', 'id'=>'id_cliente','required']); !!}  	

			          {!! Form::label('Fecha') !!}
			          {!! Form::text('fecha',$fechad,['class' => 'uk-input datepicker','maxlength'=>'12','placeholder'=>'Ingrese Desde','required']) !!} 	            
			   </div>
			   
				<div class="uk-column-1-3 uk-padding-small">
				 
			      
			          {!! Form::label('Tipo') !!}
			            {!! Form::select('id_tipocotizacion', $tipocotizacion,null,['placeholder' => 'Seleccione','class' => 'uk-select', 'required']); !!}
			             {!! Form::label('Validez') !!}
			          {!! Form::number('validez',null,['id'=>'validez','class'=>'uk-input']) !!} 
			       {!! Form::label('Estatus') !!}
			            {!! Form::select('id_estatus', [ '1' => 'Activo', '2' => 'Inactivo'],null,['placeholder' => 'Seleccione','class' => 'uk-select', 'required']); !!}  
                     
			           
				</div>

				<div class="uk-column-1-2 uk-padding-small">
			                  
			          {!! Form::label('Observaciones') !!}
			          {!! Form::text('detalle',null,['id'=>'detalle','class'=>'uk-input']) !!} 
			          
			        {!! Form::label('Usuario') !!}
			          {!! Form::text('id_usuario',$idusuario,['id'=>'id_usuario','class'=>'uk-input','readonly']) !!}   
			   </div>
			   <div class="uk-column-1-4 uk-padding-small uk-margin uk-card uk-card-default uk-card-body">
					      
			            {!! Form::label('Material') !!}
			            {!! Form::select('pid_material', $material,null,['placeholder' => 'Seleccione','class' => 'uk-select uk-search-field','id'=>'pid_material']); !!} 
			          
			           {!! Form::label('Cantidad') !!}
			          {!! Form::number('pcantidad',null,['id'=>'pcantidad','class'=>'uk-input','placeholder' => 'Indique Cantidad']) !!}   
			            {!! Form::label('Precio') !!}
			          {!! Form::number('pprecio',null,['id'=>'pprecio','class'=>'uk-input','placeholder' => 'Indique Precio']) !!} 

			          <div class="uk-width-1-1 uk-padding-small">
                      <button type="button" id="agregar" class="uk-button uk-button-default">Incluir</button>
           			 </div>
			   </div>
               <div class="uk-grid-collapse uk-child-width-1-2 uk-margin-small-top" uk-grid>
               	<table id="detalles" class="table table-hover">
                  <thead style="background-color: #A9D0F5">
                  	<th>Opciones</th>
                  	<th>Material</th>
                  	<th>Cantidad</th>
                  	<th>Precio</th>
                  	<th>Subtotal</th>
                  </thead>
                  <tfoot>
                  	<th>Total</th>
                  	<th></th>
                  	<th></th>
                  	<th></th>
                  	<th><h4 id="total">Bs/. 0.00</h4></th>
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
						   <?php echo link_to_route('cotizacion.index', $title = 'Cancelar',$parameters = [],['class'=>'uk-button uk-button-primary']); ?>
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
	
	$(document).ready(function() {
		$('#pid_material').change(function() {
			mostrar_precio();
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
    	precio = $('#pprecio').val();
    	if(idmaterial!="" && cantidad!="" && cantidad>0  && precio!="" && precio>0)
    	{
    		subtotal[contador]=(precio*cantidad);
    		total = total + subtotal[contador];
    		var fila = '<tr class="selected" id="fila'+contador+'"><td><button type="button"class="btn btn-warning" onclick="eliminar('+contador+');">X</button></td><td><input type="hidden" name="idmaterial[]" value="'+idmaterial+'">'+dmaterial+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="precio[]" value="'+precio+'"></td><td>'+subtotal[contador]+'</td></tr>';
    		contador++;
    		limpiar();
    		$("#total").html("Bs/." + total);
    		verificar();
    		$("#detalles").append(fila);
    	}
    	else{alert("Error al ingresar item de la cotización");}
    }

	function limpiar()
	{
		$('#pcantidad').val("");
		$('#pprecio').val("");
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
	function mostrar_precio()
	{
		idmaterial = $('#pid_material').val();
		idm=0;
		prec=0;
		
         @foreach($zmaterial as $zmate)
            idm = {{ $zmate->id}};
            
         if(idmaterial == idm){
         	prec = {{ $zmate->precio_venta}};
         }
		 @endforeach
		  $("#pprecio").val(prec);	
	}

	
</script>
@endpush  
@stop
