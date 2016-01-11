<div class = "eventos"> 

	<div class="boton_nueva_noticia">
    	
        <a href="index.php?contenido=espacio_form_admin">NUEVO ESPACIO</a>
    	
    </div>
	
    <div id="noticias">
    	
        <?php
		
			include( "./src/php/basedatos/bdhandler.php" );
			include( "./src/php/basedatos/espaciohandler.php" );
			
			$bd = new bdhandler( "localhost", "diu", "root", "" );
			
			$consulta = $bd->connection->query( "SELECT * FROM espacio" );
			$espacio = new Espacio();
			
			while( $row = $consulta->fetch_assoc() ){
				
				$espacio->get_espacio( $row );
				
				$espacio->show_espacio();
				
			}
			
			$bd->close();
			
		?>
        
    </div>

</div>