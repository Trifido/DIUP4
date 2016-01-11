<div class = "accept_user">
	<?php
    
        include( "./src/php/basedatos/bdhandler.php" );
        include( "./src/php/basedatos/usershandler.php" );
        include( "./src/php/basedatos/pymeshandler.php" );
        
		$db = new bdhandler( "localhost", "diu", "root", "" );
        $pyme = new Pyme();
        $user = new Usuario();
		
		if( isset( $_POST['admit'] )){
			
			$var = $_POST['user'];			
			$db->connection->query( "UPDATE pertenecer SET puesto = 'aceptado'
									WHERE user1 = '".$var."'" );
			
			$db->connection->query( "UPDATE usuarios SET estado = true
									WHERE user = '".$var."'" );
			
		}else if( isset( $_POST['delete'] ) ){
			
			$var = $_POST['user'];			
			$db->connection->query( "UPDATE pertenecer SET puesto = NULL
									WHERE user1 = '".$var."'" );
			
			$db->connection->query( "UPDATE usuarios SET estado = false
									WHERE user = '".$var."'" );
			
		}
		
        
        $query = $db->connection->query( "SELECT * FROM pertenecer WHERE user2 = '".$_SESSION['empresa'][0]."'" );	
        
        while( $aux = $query->fetch_assoc() ){
            
            if( $aux["puesto"] == NULL )
                echo "
					<form id ='boton_gestion_user' method='POST'>
					".$aux["user1"]."
					<input id='texto' type='text' name='user' value='".$aux["user1"]."'>
					<button type='submit' name='admit'> ADMITIR </button>
            		</form>";
			else
                echo "
					<form id ='boton_gestion_user' method='POST'>
					".$aux["user1"]."
					<input id='texto' type='text' name='user' value='".$aux["user1"]."'>
					<button type='submit' name='delete'> ELIMINAR </button>
            		</form>";
            echo "<br>";
        
        }
        
		$db->close();
    
    ?>
</div>	