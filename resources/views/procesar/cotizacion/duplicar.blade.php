<div class="uk-width-1-2s  uk-padding-small" style="background-color:  #f0f0f0">
<div class="modal-wrapper" id="popup2">
  <div class="popup2-contenedor">

      <h4>Duplicar Cotización</h4>
  {!! Form::open(['route' => 'procesar.cotizacion.duplicar', 'method' => 'get', 'class' => 'uk-form-stacked']) !!}
        <fieldset class="uk-fieldset">
        <table class="uk-table uk-table-striped"> 
          <tr>
            <td>
               <div class="uk-margin">
                  {!! Form::label('Nro Cotización Origen') !!}
                  {!! Form::text('id',$cotizacions->id,['class' => 'uk-input','id'=>'id','maxlength'=>'12','readonly']) !!}  
                </div>
              </td>
            <td>
               <div class="uk-margin">
                    {!! Form::label('Empresa') !!}  
                 {!! Form::select('id_empresa', $empresa,null,['placeholder' => 'Seleccione','class' => 'uk-select', 'id'=>'id_empresa','required']); !!}  
                </div>
              </td>


            <td>
               <div class="uk-margin">
                    {!! Form::label('Cliente') !!}  
                 {!! Form::select('id_cliente', $cliente,null,['placeholder' => 'Seleccione','class' => 'uk-select', 'id'=>'id_cliente','required']); !!}  
                </div>
              </td>
              <td>
                 {!! Form::label('Tipo') !!}
                  {!! Form::select('id_tipocotizacion', $tipocotizacion,null,['placeholder' => 'Seleccione','class' => 'uk-select', 'required']); !!}
              </td>                     
          </tr>
          <tr>
            <td colspan="4">
              {!!Form::submit('Procesar',['class'=>'uk-button uk-button-primary'])!!}
            </td>
          </tr>
        </tr>  
      </table>
      </fieldset>
      {!! Form::close() !!} 
      <a class="popup2-cerrar" href="#">X</a>
                        
  </div>
</div>                                    
</div>

