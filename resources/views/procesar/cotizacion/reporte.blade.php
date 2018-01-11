<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Cotizacion</title>
  </head>
  <body>

    <main>
    <div style="background-color:gray; color:#FFF; text-align: center;">
          <b>{!! strtoupper($cotizacion->nombre)." DEL DÍA ".$cotizacion->fecha !!}</b>
    </div>

          <p> {!! $cotizacion->nombre !!} </p>
  </body>
</html>