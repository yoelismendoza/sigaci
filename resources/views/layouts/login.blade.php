<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sigaci. Sistema de Gestión Administrativa y Control de Inventario</title>

        <link rel="stylesheet" href="css/uikit.min.css" />
        <link rel="stylesheet" href="css/uikit-rtl.min.css" />
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/uikit.min.js"></script>
        <script src="js/uikit-icons.min.js"></script>

        <script src="js/core/cover.min.js"></script>
        <script src="js/core/core.min.js"></script>

</head>
<body >

            <div class="uk-width-1-1" uk-height-viewport>
              <img src="http://lorempixel.com/800/380" width="100%" height="100%">
              
            </div>
               <div class="uk-position-cover  uk-flex uk-flex-center uk-flex-middle">
                    <div class="uk-container-small uk-background-primary ">
                       <div class="uk-padding">
                           
              <form name="login" enctype="multipart/form-data" method="POST" action="{{route ('login.store')}}" accept-charset="UTF-8">
			  <input type="hidden" name="_token" id="csrf-token" value="{{csrf_token()}}" />                                       <br />
                            <fieldset class="uk-fieldset">

                                <legend class="uk-legend uk-light">Login de Acceso</legend>

                                <div class="uk-margin">
                                    <input name="usuario" class="uk-input" type="text" placeholder="Usuario">
                                </div> 
                                <div class="uk-margin">
                                    <input name="password" class="uk-input" type="password" placeholder="Contraseña">
                                </div> 
                                
                                <div class="uk-margin">
                                    <input class="uk-button-default uk-button" type="submit" value="Entrar">
                                </div>                                

                            </fieldset>
                        </form>
                       </div>
                    </div>
              </div> 
   
                    
   


</body>
</html>