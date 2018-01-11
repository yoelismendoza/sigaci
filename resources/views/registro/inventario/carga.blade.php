  <link rel="stylesheet" href="{{ asset('css/uikit.min.css') }}" />
      <link rel="stylesheet" href="{{ asset('css/uikit-rtl.min.css') }}" />
      <link rel="stylesheet" href="{{ asset('css/modal.css') }}" />
        <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('js/uikit.min.js') }}"></script>
        <script src="{{ asset('js/uikit-icons.min.js') }}"></script>
<body>


<div class="uk-width-1-1 uk-width-5-6@m">
{!! Form::model($inventario, ['route' => ['inventario.update', $inventario->id], 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}        
<?php  //$dimage='/imagenes/parentescos/'.$parentesco->image; ?>   
<fieldset class="uk-fieldset">
 <table class="uk-table uk-table-striped"> 
  <tr>
    <td>
        <div class="uk-margin">
                {!! Form::label('Almacen') !!}
                  {!! Form::select('id_almacen', $almacen,$inventario->id_almacen,['placeholder' => 'SELECCIONE','class' => 'uk-select', 'readonly']); !!}
        </div>
     </td>
     <td>  
        <div class="uk-margin">
                {!! Form::label('Ejercicio') !!}
                  {!! Form::select('id_ejercicio', $ejercicio,$inventario->id_ejercicio,['placeholder' => 'SELECCIONE','class' => 'uk-select', 'readonly']); !!}                   
        </div>
    </td>
    <td>
          <div class="uk-margin">
                {!! Form::label('Desde') !!}
                {!! Form::text('desde',null,['class' => 'uk-input datepicker','maxlength'=>'12','placeholder'=>'Ingrese Desde','readonly']) !!}  
          </div>
     </td>
     <td>     
          <div class="uk-margin">
                 {!! Form::label('Hasta') !!}
                 {!! Form::text('hasta',null,['class' => 'uk-input datepicker','maxlength'=>'12','placeholder'=>'Ingrese hasta','readonly']) !!}  
           </div>
    </td>
   </tr>

   <tr>
     <td colspan="2">
        <div class="uk-margin">
                {!! Form::label('Material') !!}
                {!! Form::select('id_material', $material,null,['placeholder' => 'SELECCIONE','class' => 'uk-select', 'required']); !!}
        </div>
    
   
          <div class="uk-margin">
                {!! Form::label('Precio_Compra') !!}
                {!! Form::text('precio_compra',null,['class' => 'uk-input datepicker','maxlength'=>'12','placeholder'=>'Ingrese precio de compra','required']) !!}  
          </div>
              <div class="uk-margin">
                {!! Form::label('Precio_Venta') !!}
                {!! Form::text('precio_venta',null,['class' => 'uk-input datepicker','maxlength'=>'12','placeholder'=>'Ingrese precio de venta','required']) !!}  
          </div>
         
          <div class="uk-margin">
                 {!! Form::label('Cantidad') !!}
                {!! Form::text('cantidad',null,['class' => 'uk-input datepicker','maxlength'=>'12','placeholder'=>'Ingrese cantidad','required']) !!}  
           </div>
    </td> 
   </tr>
 
  </table>           
  </fieldset>

			   {!!Form::submit('Guardar',['class'=>'uk-button uk-button-primary'])!!}
			   <?php echo link_to_route('inventario.index', $title = 'Cancelar',$parameters = [],['class'=>'uk-button uk-button-primary']); ?>

{!! Form::close() !!} 
</div>
