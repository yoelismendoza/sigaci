@extends ('layouts.principal')
@section('titulo')
  Ficha de Carga de Inventario
@endsection
@section('content')

{!! Form::model($inventario, ['route' => ['inventario.edit', $inventario->id], 'method' => 'GET', 'enctype'=>'multipart/form-data']) !!}  


<div class="uk-width-1-2s  uk-padding-small" style="background-color:  #f0f0f0">
               <div class="uk-column-1-4@m">
                {!! Form::label('Almacen') !!}
                  {!! Form::select('id_almacen', $almacen,null,['placeholder' => 'SELECCIONE','class' => 'uk-select', 'readonly']); !!}
                {!! Form::label('Ejercicio') !!}
                  {!! Form::select('id_ejercicio', $ejercicio,null,['placeholder' => 'SELECCIONE','class' => 'uk-select', 'readonly']); !!}
                           
             </div>    
             <div class="uk-column-1-4@m">
               {!! Form::label('Desde') !!}
                {!! Form::text('desde',null,['class' => 'uk-input datepicker','maxlength'=>'12','placeholder'=>'Ingrese Desde','readonly']) !!}  
                 {!! Form::label('Hasta') !!}
                {!! Form::text('hasta',null,['class' => 'uk-input datepicker','maxlength'=>'12','placeholder'=>'Ingrese hasta','readonly']) !!} 
             </div>
    
      <div class="uk-column-1-4@m">  
               {!! Form::label('Fecha') !!}
                {!! Form::text('fecha',null,['class' => 'uk-input datepicker','maxlength'=>'12','placeholder'=>'Ingrese fecha','readonly','readonly']) !!}      
                {!! Form::label('Estatus') !!}
                  {!! Form::select('id_estatus', [ '1' => 'Activo', '2' => 'Inactivo'],null,['placeholder' => 'SELECCIONE','class' => 'uk-select', 'readonly']); !!}
                       
      </div>
      <div class="uk-grid-collapse uk-child-width-1-1 uk-margin-small-top" uk-grid>
                <table id="detalles" class="table table-hover">
                  <thead style="background-color: #A9D0F5">
                    <th>Id</th>
                    <th>Material</th>
                    <th>Cantidad</th>
                    <th>Precio Compra</th>
                    <th>Precio Venta</th>
                  </thead> 
                  @foreach($detalles as $zdetalles)
                   <tbody>
                   <tr>
                      <td align="center">{{$zdetalles->id}}</td>
                      <td>{{$zdetalles->descripcion}}</td>
                      <td align="center">{{$zdetalles->cantidad }}</td>
                      <td align="right"><?php echo number_format($zdetalles->precio_compra,2,',','.'); ?></td>
                      <td align="right"><?php echo number_format($zdetalles->precio_venta,2,',','.'); ?></td>                                   
                  </tr>
                  </tbody>
                  @endforeach
 
                </table>
      </div>    
     
  
</div>
 <div class="uk-width-1-1">                         
          <?php echo link_to_route('inventario.index', $title = 'Cancelar',$parameters = [],['class'=>'uk-button uk-button-primary']); ?>
             </div>

{!! Form::close() !!} 

@endsection
