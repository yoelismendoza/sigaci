            <div class="uk-card uk-card-muted uk-padding-small">
                  <label>Filtrar Registros</label>
                 {!! Form::open(['route' => 'cliente.index', 'method' => 'GET', 'class'=>'uk-form-danger']) !!} 
                  <label>Código</label><input type="text" name="codigo" class="uk-input" size="10">
                  <label>Rif</label><input type="text" name="rif" class="uk-input" size="12">
                  <label>Nombre</label><input type="text" name="nombre" class="uk-input" size="12">
                  {!!Form::submit('Aplicar',['class'=>'uk-button uk-button-danger'])!!}         

                {!! Form::close() !!} 
            </div>
