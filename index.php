<?php
	error_reporting(-1);
	ini_set( 'display_errors', 1 );

	// Creación de la BD
	include("./src/php/basedatos/bd.php");
	
	session_start();
	
	if(isset($_GET['salir'])){
		session_destroy();
		header("location:index.php");
	}
	
?>



<!doctype html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta name="author" content="Alberto Vicente Alba" />
        
		<title>Proyecto DIU</title>
		<link href="./assets/css/style.css" rel="stylesheet" type="text/css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript" src="./assets/js/scripts.js"></script>
        
	</head>

	<body>
    	
        <div class="marco">
        
        <?php
			
			if( isset( $_GET["contenido"] ) ){
				$contenido = $_GET["contenido"];	
			}else{
				
				if( isset( $_SESSION['user'] ) ){
					
					$contenido="empresas";
					
				}else if( isset( $_SESSION['empresa'] ) ){
					
					$contenido="noticias_empresa";
					
				}else{
					
					$contenido="empresas";
					
				}	
				
			}
				
			// Header
			include( "./src/php/header.php" );
			
			// cambio del menu en funcion del tipo de usuario logeado
			if( isset( $_SESSION['user'] ) ){

				include( "./src/php/menu_user.php" );
				include( "./src/php/logout.php" );
				include( "./src/php/content.php" );
				
			}else if( isset( $_SESSION['empresa']) ){
				
				//$contenido="noticias_user";
				include( "./src/php/menu_empresa.php" );
				include( "./src/php/logout.php" );
				include( "./src/php/content.php" );

			}else if ( isset( $_SESSION['admin']) ){

				include( "./src/php/menu_admin.php" );
				include( "./src/php/logout.php" );
				include( "./src/php/content.php" );
				
			}else{
				
				include( "./src/php/menu.php" );
				include( "./src/php/login.php" );
				
				// Cambio del contenido mostrado
				if( isset( $_GET["login"] ) )
					include( "./src/php/contents/login.php" );
				else if( isset( $_GET["register"] ) )
					include( "./src/php/contents/registro.php" );
				else 
					include( "./src/php/content.php" );
			}
				
			// Footer
			include( "./src/php/footer.php" );
			
		?>
        
        </div> <!-- End Marco -->
        
    </body>
    
</html>
    