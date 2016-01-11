<div class="marco_formulario">
	<table style="width:100%">
      <tr>
      	<th>EMPRESA</th> 
        <th>FECHA</th>
        <th>CANTIDAD</th> 
      </tr>
	<?php
    
		include( "./src/php/basedatos/bdhandler.php" );
		
		$bd = new bdhandler( "localhost", "diu", "root", "" );
		$consulta = $bd->connection->query( "SELECT * FROM pago" );
		
		while( $row = $consulta->fetch_assoc() ){
			
			echo "<tr>";
				echo "<td>";
				echo $row['nombre_empresa'];
				echo "</td>";
				echo "<td>";
				echo $row['fecha'];	
				echo "</td>";
				echo "<td>";
				echo $row['cantidad'];echo " €";
				echo "</td>";
			echo "</tr>";
			
		}
	
    ?>
	</table>
</div>