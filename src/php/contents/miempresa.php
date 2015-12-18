<?php

	include( "./src/php/basedatos/bdhandler.php" );
	include( "./src/php/basedatos/usershandler.php" );
	
	$db = new bdhandler( "localhost", "diu", "root", "" );
	$user = new Usuario();
	$query = $db->connection->query( "SELECT * FROM usuarios WHERE user = '".$_SESSION['user'][0]."'");
	$user->get_user( $query->fetch_assoc() );
	
	if( $user->estado ){
		
		include( "./src/php/contents/pyme_logic/tengoempresa.php" );
		
	}else{
		
		$query2 = $db->connection->query( "SELECT * FROM pertenecer WHERE user1 = '".$user->user."'" );
		
		if( ( $row = $query2->fetch_assoc() ) )
			echo "<h1>Esperando confirmación de la empresa: ".$row["user2"]."</h1>";
		else
			include( "./src/php/contents/pyme_logic/seleccionarempresa.php" );		
		
	}
	
	$db->close();
	
?>