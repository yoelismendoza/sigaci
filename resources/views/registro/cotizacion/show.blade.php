@extends ('layouts.principal')
@section('titulo')
  Ficha de Cotización
@endsection
@section('content')

{!! Form::model($cotizacion, ['route' => ['cotizacion.edit', $cotizacion->id], 'method' => 'GET', 'enctype'=>'multipart/form-data']) !!}  
<div class="uk-width-1-2s  uk-padding-small" style="background-color:  #f0f0f0">
 

  <div class="uk-column-1-3 uk-padding-small"> 
     {!! Form::label('Empresa') !!} 
                 {!! Form::select('id_empresa', $empresa,$cotizacion->id_empresa,['placeholder' => 'Seleccione','class' => 'uk-select', 'id'=>'id_empresa','required']); !!} 
                 {!! Form::label('Cliente') !!}  
                 {!! Form::select('id_cliente', $cliente,$cotizacion->id_cliente,['placeholder' => 'Seleccione','class' => 'uk-select', 'id'=>'id_cliente','readonly']); !!}   

                {!! Form::label('Fecha') !!}
                {!! Form::text('fecha',null,['class' => 'uk-input datepicker','maxlength'=>'12','placeholder'=>'Ingrese Desde','readonly']) !!}              
  </div>
  <div class="uk-column-1-3 uk-padding-small">
               
                {!! Form::label('Tipo') !!}
                  {!! Form::select('id_tipocotizacion', $tipocotizacion,null,['placeholder' => 'Seleccione','class' => 'uk-select', 'readonly']); !!}
                   {!! Form::label('Validez') !!}
                {!! Form::number('validez',null,['id'=>'validez','class'=>'uk-input']) !!} 
             {!! Form::label('Estatus') !!}
                  {!! Form::select('id_estatus', [ '1' => 'Activo', '2' => 'Inactivo'],null,['placeholder' => 'Seleccione','class' => 'uk-select', 'readonly']); !!}  
        
        </div>

        <div class="uk-column-1-2 uk-padding-small">
                        
                {!! Form::label('Observaciones') !!}
                {!! Form::text('detalle',null,['id'=>'detalle','class'=>'uk-input','readonly']) !!} 
                
              {!! Form::label('Usuario') !!}
                {!! Form::text('id_usuario',null,['id'=>'id_usuario','class'=>'uk-input','readonly']) !!}   
         </div>
               <div class="uk-grid-collapse uk-child-width-1-1 uk-margin-small-top" uk-grid>
                <table id="detalles" class="table table-hover">
                  <thead style="background-color: #A9D0F5">
                    <th>Item</th>
                    <th>Material</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Subtotal</th>
                  </thead>
                    <?php $total=0; $pos=1; ?>
                   <tbody>
                    @foreach($cotizacion_detalle as $cotizacion_detalles)
                    <td align="center"><?php echo $pos?></td>
                     <td>{{ $cotizacion_detalles->id_material }} {{ $cotizacion_detalles->descripcion}}</td>
                     <td align="center">{{ $cotizacion_detalles->cantidad }}</td>
                     <td align="right">{{ number_format($cotizacion_detalles->precio,'2',',','.') }}</td>
                     <?php 
                     $subtotal = $cotizacion_detalles->cantidad * $cotizacion_detalles->precio;
                           $total = $total + $subtotal; $pos++;
                     ?>
                     <td align="right"><?php echo number_format($subtotal,2,',','.'); ?></td>
                  </tbody>
                  @endforeach
                     <tfoot>
                   
                    <th>Total</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th align="right"><h4 id="total">Bs/<?php echo number_format($total,2,',','.')?></h4></th>
                  </tfoot>
                </table>
               </div>

         <div class="uk-column-1-4 uk-padding-small" id="guardar">  
             <div class="uk-width-1-1">
                  

                </div>
                <div class="uk-width-1-1">
               <?php echo link_to_route('cotizacion.index', $title = 'Cancelar',$parameters = [],['class'=>'uk-button uk-button-primary']); ?>
          </div>     
        </div>             
 
</div>


{!! Form::close() !!} 

@endsection
