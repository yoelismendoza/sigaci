	<?php 
				 					     
									   ?>
<div class="uk-width-1-1 uk-width-1-6@m uk-text-center  uk-background-primary">
<!--LOGO DE LA EMPRESA -->
<img src="{{ asset ('img/f.png') }}" height="auto" width="25%" />
    
</div>
<div class="uk-width-1-1 uk-width-5-6@m uk-background-primary" >
<!--NOTIFICADORES Y OPCIONES -->
   	<div class="uk-clearfix uk-padding-small">
   		<div class="uk-float-left uk-light">Usuario: <?php 
		if(isset($_SESSION["nombre"]))
		{
		echo $_SESSION["nombre"];} 
		else {
			session_start();
			echo $_SESSION["nombre"];
		}?></div>
   		<div class="uk-float-right ">
   		
   		</div>

   	</div>
</div>