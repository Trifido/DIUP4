<div class="marco_formulario">
	<table style="width:100%">
      <tr>
        <th>FECHA</th>
        <th>CANTIDAD</th> 
      </tr>

    
	<?php
    
		include( "./src/php/basedatos/bdhandler.php" );
		
		$bd = new bdhandler( "localhost", "diu", "root", "" );
		$consulta = $bd->connection->query( "SELECT * FROM pago WHERE nombre_empresa = '".$_SESSION['empresa'][0]."'" );
		
		while( $row = $consulta->fetch_assoc() ){
			
			echo "<tr>";
				echo "<td>";
				echo $row['fecha'];	
				echo "</td>";
				echo "<td>";
				echo $row['cantidad'];
				echo "</td>";
			echo "</tr>";
		}
	
    ?>
	
    </table>
    
</div>