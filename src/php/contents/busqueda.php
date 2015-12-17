<?php

	if( isset($_POST['buscar'])){
		
		$user_coincidences = true;
		$pymes_coincidences = true;
		
		include( "./src/php/basedatos/bdhandler.php" );
		include( "./src/php/basedatos/usershandler.php" );
		
		$db = new bdhandler( "localhost", "diu", "root", "" );
		$user= new Usuario();
		
		$query = $db->connection->query( "SELECT * FROM usuarios WHERE user LIKE '%".$_POST['field']."%' ");
		
		echo('<div class = "eventos">');
			if( $query->num_rows ){
				echo('<div id="users">');
					while( $row = $query->fetch_assoc() ){
						
						$user->get_user( $row );
						$user->show_user();
						
					}
				echo('</div>');
			}else{

				$user_coincidences = false;
					
			}
		// FALTAN LAS EMPRESAS	
		
		echo('</div>');
		
	}

?>