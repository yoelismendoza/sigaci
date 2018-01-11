<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>SIGACI</title>
    	<link rel="stylesheet" href="{{ asset('css/uikit.min.css') }}" />
    	<link rel="stylesheet" href="{{ asset('css/uikit-rtl.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/modal.css') }}" />

        <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('js/uikit.min.js') }}"></script>
        <script src="{{ asset('js/uikit-icons.min.js') }}"></script>
				
</head>
<body >

		<div class="uk-grid-collapse uk-padding-remove" uk-grid>
			<!--======================
			HEADER
		    ==========================-->
		    <?php //session_start();

			//include 'modules/header.blade.php'; ?>
		   	@include('layouts.header')
		   	<!--======================
			MENU
		    ==========================-->
			@include('layouts.menu')
			 <?php //include 'modules/menu.blade.php'; ?>


			 <!--===========-->

		   	<!--======================
			CONTENIDO
		    ==========================-->
		    <div class="uk-width-1-1 uk-width-5-6@m">

		    	<div class="uk-background-muted uk-padding-small">
			    	<div class="uk-clearfix">
			    		<div class="uk-float-left">
			    			<h4 class="uk-margin-remove">@yield('titulo')</h4 class="uk-margin-remove">
			    		</div>
			    		
			    	</div>
		    	</div>
                @yield('content')
		    	<div class="uk-padding-small">
					 <div class="uk-grid-collapse uk-child-width-1-4" uk-grid>
					 </div>

					<div class="uk-grid-collapse uk-child-width-1-3 uk-margin-small-top" uk-grid>
					</div>
					<div class="uk-grid-collapse uk-child-width-1-2 uk-margin-small-top" uk-grid>
					</div>
		    	</div>

		    </div>
		    	<!--======================
			FOOTER
		    ==========================-->
		    <?php include 'modules/footer.php' ?>
		    
		</div>
  <!--<script src="{{asset('datePicker/js/bootstrap-datepicker.js')}}"></script>
    <!-- Languaje -->
    <!-- <script src="{{asset('datePicker/locales/bootstrap-datepicker.es.min.js')}}"></script>  -->
<script src="{{ asset('js/jquery-1.12.4.js') }}"></script>
  <script src="{{ asset('js/jquery-ui.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
  
<script type="text/javascript">
    $('.datepicker').datepicker({
                    dateFormat: 'yy-mm-dd',
					changeMonth:true,
					changeYear:true,	
					firstDay: 1,
					monthNames: ['Enero', 'Febreo', 'Marzo',
					'Abril', 'Mayo', 'Junio',
					'Julio', 'Agosto', 'Septiembre',
					'Octubre', 'Noviembre', 'Diciembre'],
					monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
					'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
					dayNamesMin: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab']});
 </script> 
@stack('scripts')
<script type="text/javascript">
   $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });
</script>		


</body>
</html>