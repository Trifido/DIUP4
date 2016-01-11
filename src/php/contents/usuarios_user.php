<div class = "eventos">
	
    <div id="users">
    	
        <?php
		
			include( "./src/php/basedatos/bdhandler.php" );
            include( "./src/php/basedatos/usershandler.php" );
			
			$bd = new bdhandler( "localhost", "diu", "root", "" );
			
			$user = new Usuario();
			
			$consulta = $bd->connection->query( "SELECT * FROM pertenecer WHERE user1 = '".$_SESSION['user'][0]."'" );
			
			$resultado = $consulta->fetch_assoc();
			
			$consulta = $bd->connection->query( "SELECT * FROM pertenecer WHERE user2 = '".$resultado["user2"]."'" );
			
			while( $row = $consulta->fetch_assoc() ){
			
				$consulta_usuarios = $bd->connection->query( "SELECT * FROM usuarios WHERE user = '".$row['user1']."'" );
					
				$user->get_user( $consulta_usuarios->fetch_assoc() );
				
				if( $user->estado == TRUE )
					$user->show_user();

			}
            
            $bd->close();
			
		?>
        
	</div>
    
</div>