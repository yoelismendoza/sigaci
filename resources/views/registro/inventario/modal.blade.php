<div class="modal-wrapper" id="popup">
  <div class="popup-contenedor">
      <h4>Cargar Materiales al Inventario</h4>
      {!! Form::open(['route' => 'registro.inventario.carga', 'method' => 'get', 'class' => 'uk-form-stacked']) !!}
        <fieldset class="uk-fieldset">
           <table class="uk-table uk-table-striped"> 
          <tr>
            <td>
               <div class="uk-margin">
                  {!! Form::label('Inventario') !!}
                  {!! Form::text('id',$id,['class' => 'uk-input','maxlength'=>'12','readonly']) !!}  
                </div>
              </td>
            <td>
                <div class="uk-margin">
                {!! Form::label('Almacen') !!}
                  {!! Form::select('id_almacen', $almacen,$id_almacen,['class' => 'uk-select', 'readonly']); !!}
               </div>
            </td>
            <td>    
                <div class="uk-margin">
                <div class="uk-margin">
                  {!! Form::label('Ejercicio') !!}
                  {!! Form::select('id_ejercicio', $ejercicio,$id_ejercicio,['class' => 'uk-select', 'readonly']); !!}
               </div>
              </div>
           </td>
           <td>
                <div class="uk-margin">
                  {!! Form::label('Desde') !!}
                  {!! Form::text('desde',$desde,['class' => 'uk-input','maxlength'=>'12','readonly']) !!}  
                </div>
           </td>
          </tr>
          <tr>
            <td>     
               <div class="uk-margin">
                    {!! Form::label('Material') !!}
                    {!! Form::select('id_material', $material,null,['placeholder' => 'SELECCIONE','class' => 'uk-select', 'required']); !!}
               </div>
            </td>
            <td>     
             <div class="uk-margin">
                {!! Form::label('Precio Compra') !!}
                {!! Form::text('precio_compra',null,['class' => 'uk-input','maxlength'=>'12','placeholder'=>'Ingrese precio','required']) !!}  
             </div>
           </td>
             <td>     
             <div class="uk-margin">
                {!! Form::label('Precio Venta') !!}
                {!! Form::text('precio_venta',null,['class' => 'uk-input','maxlength'=>'12','placeholder'=>'Ingrese precio','required']) !!}  
             </div>
           </td>
           <td>       
            <div class="uk-margin">
                   {!! Form::label('Cantidad') !!}
                  {!! Form::text('cantidad',null,['class' => 'uk-input','maxlength'=>'12','placeholder'=>'Ingrese cantidad','required']) !!}  
             </div>
          </td>
           <tr>
            <td colspan="4">
              {!! Form::label('Detalles') !!}
                  {!! Form::text('detalle',null,['class' => 'uk-input','maxlength'=>'200','placeholder'=>'Ingrese detalle','required']) !!}  
            </td>
          </tr>
          <tr>
            <td colspan="4">
              {!!Form::submit('Guardar',['class'=>'uk-button uk-button-primary'])!!}
            </td>
          </tr>
        </tr>  
      </table>
      </fieldset>
      {!! Form::close() !!} 
      <a class="popup-cerrar" href="#">X</a>
                        
  </div>
</div>                                    
