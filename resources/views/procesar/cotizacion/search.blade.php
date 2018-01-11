     <div class="uk-card uk-card-muted uk-padding-small">
    {!! Form::open(['route' => 'cotizacion.index', 'method' => 'GET', 'class'=>'uk-form-danger']) !!} 
                  <label>Cliente</label><input type="text" name="cliente" class="uk-input" size="10" placeholder="Buscar...">
                  {!!Form::submit('Aplicar',['class'=>'uk-button uk-button-danger'])!!}         

                {!! Form::close() !!} 
            </div>
