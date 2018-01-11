<div class="uk-width-1-2s  uk-padding-small" style="background-color:  #f0f0f0">
<div class="modal-wrapper" id="popup">
  <div class="popup-contenedor">

      <h4>Cargar Materiales Cotización</h4>
  
  {!! Form::open(['route' => ['registro.cotizacion.carga',$cotizacions->id], 'method' => 'POST', 'class' => 'uk-grid-stacked','autocomplete'=>'off']) !!}

        <fieldset class="uk-fieldset">
        <table class="uk-table uk-table-striped"> 
          <tr>
            <td>
               <div class="uk-margin">
                  {!! Form::label('Id') !!}
                  {!! Form::text('id',$cotizacions->id,['class' => 'uk-input','id'=>'id','maxlength'=>'12','readonly']) !!}  
                </div>
              </td>

            <td>
               <div class="uk-margin">
                  {!! Form::label('Cliente') !!}
                  {!! Form::text('nombre',$cotizacions->nombre,['class' => 'uk-input','maxlength'=>'12','readonly']) !!}  
                </div>
              </td>
            <td>
                <div class="uk-margin">
                {!! Form::label('Fecha') !!}
               {!! Form::text('fecha',$cotizacions->fecha,['class' => 'uk-input','maxlength'=>'12','readonly']) !!} 
               </div>
            </td>
            <td >    
                
                <div class="uk-margin">
                {!! Form::label('Validez') !!}
                {!! Form::text('validez',$cotizacions->validez,['class' => 'uk-input','maxlength'=>'12','readonly']) !!} 
               </div>
              
           </td>
           
          </tr>
          <tr>
            <td colspan="2">     
               <div class="uk-margin">
                    {!! Form::label('Material') !!}
                    {!! Form::select('id_material', $material,null,['placeholder' => 'SELECCIONE','id'=>'id_material','class' => 'uk-select','required']); !!}
               </div>
            </td>
            <td>     
             <div class="uk-margin">
                {!! Form::label('Precio') !!}
                {!! Form::text('precio_venta',null,['class' => 'uk-input','maxlength'=>'12','id'=>'precio_venta','placeholder'=>'Ingrese precio','required']) !!}  
             </div>
           </td>
           <td>       
            <div class="uk-margin">
                   {!! Form::label('Cantidad') !!}
                  {!! Form::text('cantidad',null,['class' => 'uk-input','maxlength'=>'12','placeholder'=>'Ingrese cantidad','required']) !!}  
             </div>
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
</div>

@push ('scripts')
<script>
  
  $(document).ready(function() {
    $('#id_material').change(function() {

      mostrar_precio();
    });
  });
  
  function mostrar_precio()
  {
    idmaterial = $('#id_material').val();
    idm=0;
    prec=0;
    @foreach($zmaterial as $zmate)
            idm = {{ $zmate->id}};
            
         if(idmaterial == idm){
          prec = {{ $zmate->precio_venta}};
         }
     @endforeach
      $("#precio_venta").val(prec);  
  }

  
</script>
@endpush  
