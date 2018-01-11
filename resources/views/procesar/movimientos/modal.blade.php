<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$cotizacion->id}}">
	{{!! Form::Open(array('action'=>array('cotizacioncontroller@destroy,$cotizacion->id'),'method'=>'delete')) !!}}
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">*</span>
			</button>
			<h4 class="modal-title">Eliminar Cotización</h4>
		</div>
		<div class="modal-body">
			<p>Confirme Eliminar Cotización</p>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="button" class="btn btn-primary">Confirmar</button>
		</div>
	</div>
	{!! Form::close() !!} 
</div>