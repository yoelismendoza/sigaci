<div class="uk-width-1-1 uk-width-1-6@m uk-text-center  uk-background-primary">
<!--LOGO DE LA EMPRESA -->
    <h1><strong>SIGACI</strong> </h1>
</div>
<div class="uk-width-1-1 uk-width-5-6@m uk-background-primary" >
<!--NOTIFICADORES Y OPCIONES -->
   	<div class="uk-clearfix uk-padding-small">
   		<div class="uk-float-left uk-light">Usuario: <?php echo $_SESSION["nombre"]; ?></div>
   		<div class="uk-float-right ">
   		
			<div class="uk-inline">
			    <button type="button" class="uk-icon-link uk-margin-small-right uk-light" uk-icon="icon: cog"></button>


			    <div uk-dropdown="mode: click">
			    	 <ul class="uk-nav-default uk-nav-parent-icon" uk-nav>
				        <li class="uk-active"><a href="#">Active</a></li>
				        <li class="uk-parent">
				            <a href="#">Parent</a>
				            <ul class="uk-nav-sub">
				                <li><a href="#">Sub item</a></li>
				                <li><a href="#">Sub item</a></li>
				            </ul>
				        </li>
				        <li class="uk-parent">
				            <a href="#">Parent</a>
				            <ul class="uk-nav-sub">
				                <li><a href="#">Sub item</a></li>
				                <li><a href="#">Sub item</a></li>
				            </ul>
				        </li>
				        <li class="uk-nav-header">Header</li>
				        <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: table"></span> Item</a></li>
				        <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: thumbnails"></span> Item</a></li>
				        <li class="uk-nav-divider"></li>
				        <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: trash"></span> Item</a></li>
				    </ul>
			    </div>
			</div>
   		</div>

   	</div>
</div>