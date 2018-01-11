
<html>
<body>  
<table>
        <tr>
          <td><img src="{{ asset('img/silueta.png') }}" alt="" width="100" height="55"></td>
          <td><?php echo $cotizacion->nombrep; ?><br><p> {!! $cotizacion->descripcion !!} </p></td>
        </tr>
</table>
 <div style="background-color:gray; color:#FFF; text-align: center;">
         <b>Presupuesto Nro {!! $cotizacion->id !!}</b>
 </div>
<table>
  <tr>
          <td><p>Cliente:</p></td>
          <td><?php echo $cotizacion->nombrec; ?></td>  
  </tr>
  <tr>
          <td><p>Dirección:</p></td>
          <td><?php echo $cotizacion->direccion; ?></td>  
  </tr>
  <tr>
          <td><p></p></td>
          <td align="left">Fecha: <?php echo $cotizacion->fecha; ?></td>  
  </tr>

</table>
          
</body>
</html>

