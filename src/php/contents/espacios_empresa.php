<div class = "eventos">
	
    
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
				if( !$espacio->estado ){
					
					echo "
					
						<div class='boton_reservar_espacio'>
    	
							<a href='index.php?contenido=reservar&id=".$espacio->id."'>RESERVAR ESPACIO</a>
						
					</div>
				
						";
					}else{
						
						echo "<div class='boton_reservar_espacio'>
								ESPACIO NO DISPONIBLE
								</div>
							";
							
					}
			}
			
			$bd->close();
			
		?>
        
    </div>
    
</div>