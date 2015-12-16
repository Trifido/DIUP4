
<div class="marco_perfil">
	
    <?php
		
		include( "./src/php/basedatos/bdhandler.php" );
		include( "./src/php/basedatos/usershandler.php" );
		
		$db = new bdhandler( "localhost", "diu", "root", "" );
		$query = $db->connection->query( "SELECT * FROM usuarios WHERE user = '".$_SESSION['user'][0]."'");
		$user = new Usuario();
		
		$user->get_user( $query->fetch_assoc() );
		
		$user->show_profile();
		
		$db->close();
	?>
    
</div>
<a href="index.php?contenido=modificar"><div id="logout">MODIFICAR PERFIL</div></a>