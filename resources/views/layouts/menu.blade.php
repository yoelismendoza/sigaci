 			<div class="uk-width-1-1 uk-visible@m uk-width-1-6@m uk-background-secondary uk-light" uk-height-viewport="expand: true">
				<!--LISTA DE MENU -->
				<div class="uk-padding-small">
					<ul class="uk-nav uk-nav-default uk-nav-parent-icon" uk-nav>
					<!--ITEM ACTIVO-->
				        <li class="uk-active" ><a href="index.php"><span class="uk-padding-small" uk-icon="icon:home; ratio:2"></span>Inicio</a></li>
				    <!--===-->
				    <!--ITEN DESPLEGABLE-->

				        <li class="uk-parent">
				            <a href="#"><span class="uk-padding-small"> Configurar</span></a>
							<ul class="uk-nav-sub">
								 <li>
									<a href="{{ route('ejercicio.index') }}"><span class="uk-padding-small" uk-icon="icon:world; ratio:1"></span>Ejercicio</a>	
									<a href="{{ route('almacen.index') }}"><span class="uk-padding-small" uk-icon="icon:thumbnails; ratio:1"></span>Almacen</a>				
									<a href="{{ route('tipoempresa.index') }}"><span class="uk-padding-small" uk-icon="icon:grid; ratio:1"></span>Tipo Empresa</a>
                                    <a href="{{ route('empresa.index') }}"><span class="uk-padding-small" uk-icon="icon:bookmark; ratio:1"></span>Empresa</a>
								 	<a href="{{ route('tipocotizacion.index') }}"><span class="uk-padding-small" uk-icon="icon: credit-card; ratio:1"></span>Cotización</a>
				 					<a href="{{ route('tipomaterial.index') }}"><span class="uk-padding-small" uk-icon="icon:album; ratio:1"></span>Material</a>
		 							<a href="{{ route('tipomovimiento.index') }}"><span class="uk-padding-small" uk-icon="icon:table; ratio:1"></span>Movimientos</a>
									<a href="{{ route('parametros.index') }}"><span class="uk-padding-small" uk-icon="icon:cog; ratio:1"></span>Parámetros</a>
			
								 </li>
                           </ul>							

				        </li>
				        <li class="uk-parent">
				            <a href="#"><span class="uk-padding-small"> Registrar</span></a>
							<ul class="uk-nav-sub">
								 <li>

										<a href="{{ route('cliente.index') }}"><span class="uk-padding-small" uk-icon="icon:user; ratio:1"></span>Clientes</a>
										<a href="{{ route('proveedor.index') }}"><span class="uk-padding-small" uk-icon="icon:nut; ratio:1"></span>Proveedores</a>
								 		<a href="{{ route('material.index') }}"><span class="uk-padding-small" uk-icon="icon:album; ratio:1"></span>Materiales</a>
					 		<a href="{{ route('inventario.index') }}"><span class="uk-padding-small" uk-icon="icon:paint-bucket; ratio:1"></span>Inventario</a>	
					<a href="{{ route('cotizacion.index') }}"><span class="uk-padding-small" uk-icon="icon:paint-bucket; ratio:1"></span>Cotización</a>

								 </li>
                           </ul>							

				        </li>
				        <li class="uk-parent">
				            <a href="#"><span class="uk-padding-small"> Procesar</span></a>
							<ul class="uk-nav-sub">
								 <li>
                                        
										<a href="{{ route('cliente.index') }}"><span class="uk-padding-small" uk-icon="icon:paint-bucket; ratio:1"></span>Ajustes</a>
										<a href="{{ route('cotizacion.index') }}"><span class="uk-padding-small" uk-icon="icon:paint-bucket; ratio:1"></span>Cotización</a>
								 		<a href="{{ route('movimientos.index') }}"><span class="uk-padding-small" uk-icon="icon:paint-bucket; ratio:1"></span>Movimientos</a>

								 </li>
                           </ul>							

				        </li>
					<?php //echo $zmenu->render(); ?>
				    <!--===-->
				    </ul>		
				</div>

		    </div>
		    <!--==========FIN MENU=============-->