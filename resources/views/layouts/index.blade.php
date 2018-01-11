@extends ('layouts.principal')

@section('titulo')
   <?php 
     echo "Bienvenido(a): ".$_SESSION['nombre'];
   ?>
@endsection

@section ('content')


@stop
