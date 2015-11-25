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
		<script type="text/javascript" src="./assets/js/scripts.js"></script>
	</head>

	<body>
    	
        <div class="marco">
        
        <?php
			
			if( isset( $_GET["contenido"] ) )
				$contenido = $_GET["contenido"];	
			else
				$contenido="empresas";
			
			
			include( "./src/php/header.php" );
			include( "./src/php/menu.php" );
			
			
			if( isset( $_SESSION['user'] ) )
				include( "./src/php/logout.php" );
			else
				include( "./src/php/login.php" );
			
			if( isset( $_GET["login"] ) )
				include( "./src/php/contents/login.php" );
			else if( isset( $_GET["register"] ) )
				include( "./src/php/contents/registro.php" );
			else 
				include( "./src/php/content.php" );
			
			
			include( "./src/php/footer.php" );
			
		?>
        
        </div> <!-- End Marco -->
        
    </body>
    
</html>
    