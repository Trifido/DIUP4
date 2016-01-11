<div class = "eventos">
    <div id="noticias">
        <?php
            
            include( "./src/php/basedatos/bdhandler.php" );
            include( "./src/php/basedatos/noticiahandler.php" );
            
            $bd = new bdhandler( "localhost", "diu", "root", "" );
            
			$consulta = $bd->connection->query( "SELECT * FROM pertenecer WHERE user1 = '".$_SESSION['user'][0]."'" );
			
			$resultado = $consulta->fetch_assoc();
			
            $consulta = $bd->connection->query( "SELECT * FROM noticia WHERE empresa = '".$resultado["user2"]."'" );
            $noticia = new Noticia();
            
            while( $row = $consulta->fetch_assoc() ){
                
                $noticia->get_noticia( $row );
                
                $noticia->show_noticia();
                
            }
            
            $bd->close();
                
        ?>
    </div>	
</div>