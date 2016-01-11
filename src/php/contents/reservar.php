<?php
	
	include( "./src/php/basedatos/bdhandler.php" );
	include( "./src/php/basedatos/espaciohandler.php" );
	
	$bd = new bdhandler( "localhost", "diu", "root", "" );
	$espacio = new Espacio();
	$consulta = $bd->connection->query( "SELECT * FROM espacio WHERE id = '".$_GET['id']."'" );

	$espacio->get_espacio( $consulta->fetch_assoc() );
	
	if(isset($_POST['enviar'])){
	
		/*$bd->connection->query( "UPDATE espacio SET estado = true
                                       WHERE id = '".$_GET['id']."'" );*/
		
		$bd->connection->query( "INSERT INTO reserva ( nombre_espacio, nombre_empresa,fecha ) VALUES ( '".$espacio->nombre."', '".$_SESSION['empresa'][0]."', '".$_POST['date']."' )" );
		
		$bd->connection->query( "INSERT INTO pago ( cantidad,nombre_empresa, fecha ) VALUES ( '".$espacio->precio."', '".$_SESSION['empresa'][0]."', '".$_POST['date']."' )" );
		
		header("location:index.php?contenido=espacios_empresa");
	}
	
	
	$bd->close();
	
?>

<div class="marco_formulario">

    <form class="formulario_reserva" method="post">
    	
        <h2>Formulario de reserva del espacio <?php echo $espacio->nombre ?></h2>
        PRECIO: <?php echo $espacio->precio ?> €
    	<br>
        AFORO: <?php echo $espacio->capacidad ?> personas
        <br>
        Fecha de reserva
        <br>
        <input type="date" id="date" name="date">
        <br>
        <input type="submit" id="boton" name="enviar" value="Enviar">
    </form>
</div>