 			<div class="uk-width-1-1 uk-visible@m uk-width-1-6@m uk-background-secondary uk-light" uk-height-viewport="expand: true">
				<!--LISTA DE MENU -->
				<div class="uk-padding-small">
					<ul class="uk-nav uk-nav-default uk-nav-parent-icon" uk-nav>
					<!--ITEM ACTIVO-->
				        <li class="uk-active" ><a href="index.php"><span class="uk-padding-small" uk-icon="icon:home; ratio:2"></span>Inicio</a></li>
				    <!--===-->
				    <!--ITEN DESPLEGABLE-->

					@foreach($menu as $menus)
				        <li class="uk-parent">
				            <a href="#"><span class="uk-padding-small"></span>{{$menus->descripcion }}</a>
				            <ul class="uk-nav-sub">
				                <li><a href="#"><span class="uk-padding-small" uk-icon="icon:paint-bucket; ratio:1"></span>Crear Ejercicio</a></li>
				                <li><a href="#"><span class="uk-padding-small" uk-icon="icon:paint-bucket; ratio:1"></span>Tipo de Empresas</a></li>
								<li><a href="#"><span class="uk-padding-small" uk-icon="icon:paint-bucket; ratio:1"></span>Empresas</a></li>
				            </ul>
				        </li>
					@endforeach	
				    <!--===-->
				    </ul>		
				</div>

		    </div>
		    <!--==========FIN MENU=============-->