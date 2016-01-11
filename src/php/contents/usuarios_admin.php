<div class = "eventos">
	
    <div id="users">
    	
        <?php
		
			include( "./src/php/basedatos/bdhandler.php" );
			include( "./src/php/basedatos/usershandler.php" );
			
			$bd = new bdhandler( "localhost", "diu", "root", "" );
			
			$user = new Usuario();
			
			$consulta = $bd->connection->query( "SELECT * FROM usuarios" );
			
			$cont = 1;
			
			while( $row = $consulta->fetch_assoc() ){
				
				$user->get_user( $row );
				
				if( !$user->admin ){
					echo "<img id ='img1' src ='./assets/img/".$user->foto."'>
							<div id='right'>
						
								<div id='title".$cont."'>
									".$user->nombre." <button id='boton_baja".$cont."'>Dar de baja</button>
								</div>
								
								<div id='texto'>
									".$user->info."
								</div>
								
							</div>
							";
					$cont++;
				}
			}
			
		?>
        
	</div>
    
</div>