<div class="banner_empresa">
	
	<a>Empresas</a>
    
</div>

<div class ="marco_empresa">
		
       	<?php
			
			include( "./src/php/basedatos/bdhandler.php" );
			include( "./src/php/basedatos/pymeshandler.php" );
			
			$pyme1 = new Pyme();
			$pyme2 = new Pyme();
			
			$db = new bdhandler( "localhost", "diu", "root", "" );
			$query = $db->connection->query( "SELECT * FROM empresas");
			
			$cont = 2;
			
			for( $i = 1; $i < 6; $i+=2, $cont+=2 ){
				
				$pyme1->get_pyme( $query->fetch_assoc() );
				$pyme2->get_pyme( $query->fetch_assoc() );
				
				if( $i % 3 == 0){
					
					$width1 = "350px";
					$width2 = "400px";
					
				}else{
				
					$width1 = "400px";
					$width2 = "350px";
				
				}
				
				echo "	<img id='foto_izquierda' height = '220px' width = '".$width1."' src ='./assets/img/".$pyme1->foto."'>
						
						<div id = 'desc_empresa_".$i."'> ".$pyme1->nombre." </div>
						
						<img id='foto_derecha' height = '220px' width = '".$width2."' src ='./assets/img/".$pyme2->foto."'>
						
						<div id = 'desc_empresa_".$cont."'> ".$pyme2->nombre." </div>
						
					";
								
			}
			
		?>
</div>


