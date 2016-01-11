<div class = "eventos"> 

	<div class="boton_nueva_noticia">
    	
        <a href="index.php?contenido=noticia_form_admin">NUEVA NOTICIA</a>
    	
    </div>
	
    <div id="noticias">
    	
        <?php
		
			include( "./src/php/basedatos/bdhandler.php" );
			include( "./src/php/basedatos/noticiahandler.php" );
			
			$bd = new bdhandler( "localhost", "diu", "root", "" );
			
			$consulta = $bd->connection->query( "SELECT * FROM noticia" );
			$noticia = new Noticia();
			
			while( $row = $consulta->fetch_assoc() ){
				
				$noticia->get_noticia( $row );
				
				$noticia->show_noticia();
				
			}
			
			$bd->close();
			
		?>
        
    </div>

</div>