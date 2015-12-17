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
		
		include( "./src/php/contents/pyme_logic/seleccionarempresa.php" );
		
	}
	
	$db->close();
	
?>