<div class = "eventos">
	
    <div id="users">
    	
        <?php
		
			include( "./src/php/basedatos/bdhandler.php" );
			include( "./src/php/basedatos/usershandler.php" );
			
			$bd = new bdhandler( "localhost", "diu", "root", "" );
			
			$user = new Usuario();
			
			$consulta = $bd->connection->query( "SELECT * FROM usuarios" );
			
			while( $row = $consulta->fetch_assoc() ){
				
				$user->get_user( $row );
				if( !$user->admin )
					$user->show_user();
				
			}
			
			$bd->close();
			
		?>
	</div>
    
</div>