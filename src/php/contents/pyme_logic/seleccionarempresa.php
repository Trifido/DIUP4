<div class = "empresas_select">
	
    <h1>SELECCIONE UNA EMPRESA:</h1>
    
    <?php
		
		include( "./src/php/basedatos/pymeshandler.php" );
		
		$pyme = new Pyme();
		
		if( isset( $_POST['submit'])){
			
			$query = $db->connection->query( "SELECT * FROM empresas WHERE user = '".$_POST['Pyme']."'" );
			
			$pyme->get_pyme( $query->fetch_assoc() );
			
			$db->connection->query( "INSERT INTO pertenecer( user1, user2 )
											VALUES( '".$user->user."', '".$pyme->user."'  )
			
			
			");
			
			header("location:index.php?contenido=miempresa");
			
		}
			
		
		$query = $db->connection->query( "SELECT * FROM empresas" );

		echo( '<form method="post">
				  <select name="Pyme">
					
					');
					while( $row = $query->fetch_assoc() ){
						
						$pyme->get_pyme( $row );
						
						echo( '<option value="'.$pyme->user.'">'.$pyme->nombre.'</option>' );
						
					}
					
		echo( '	  </select>
				  <br><br>
				  <input type="submit" name="submit">
				</form>'
		);
		
	?>

</div>