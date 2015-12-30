
<div class="marco_perfil">
	
    <?php
		
		include( "./src/php/basedatos/bdhandler.php" );
		
		$db = new bdhandler( "localhost", "diu", "root", "" );
		
		if( isset( $_SESSION['user'] ) ){
			
			include( "./src/php/basedatos/usershandler.php" );
			
			$query = $db->connection->query( "SELECT * FROM usuarios WHERE user = '".$_SESSION['user'][0]."'");
			$user = new Usuario();
			
			$user->get_user( $query->fetch_assoc() );
			
			$user->show_profile();
		
		}else if( isset( $_SESSION['empresa'] ) ){
			
			include( "./src/php/basedatos/pymeshandler.php" );
			
			$query = $db->connection->query( "SELECT * FROM empresas WHERE user = '".$_SESSION['empresa'][0]."'");
			
			$pyme = new Pyme();
			
			$pyme->get_pyme( $query->fetch_assoc() );
			
			$pyme->show_profile();
			
		}else{
			
			include( "./src/php/basedatos/usershandler.php" );
			
			$query = $db->connection->query( "SELECT * FROM usuarios WHERE user = '".$_SESSION['admin'][0]."'");
			$user = new Usuario();
			
			$user->get_user( $query->fetch_assoc() );
			
			$user->show_profile();
		}
		
		$db->close();
	?>
    
</div>
<a href="index.php?contenido=modificar"><div id="logout">MODIFICAR PERFIL</div></a>