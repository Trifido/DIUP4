<?php
if(isset($_POST['enviar'])){
		
		// Acceso a la BD	
		$servidor = "localhost";
		$usuario = "root";
		$passdb = "";
		$base_datos = "diu";
	
		// Conexión con el servidor.
		$mysqli = new mysqli( $servidor, $usuario, $passdb );
		if ( $mysqli->connect_errno ) {
			echo "Fallo al conectar a MySQL: " . $mysqli->connect_error;
		}
		
		// Selección de la BD
		if ( !$mysqli->select_db( "$base_datos" ) ) {
			echo "<br><br><h3 id=error>Error en la base de datos</h3><p><a href=index.php>Volver</a></p>";
		}
		
		$titulo=$_POST['title'];
		$info=$_POST['content'];
		$empresa=$_SESSION['empresa'][0];
		$tipo="empresa";
		
		if( $_FILES["foto"]["name"] ){
			$foto = basename($_FILES["foto"]["name"]);
			include( "./src/php/upload.php" );
		}else{
			
			$foto=$_POST['foto'];
			
		}
		
		$mysqli->query( "INSERT INTO noticia ( titulo, empresa, tipo, foto, info ) VALUES ( '$titulo', '$empresa', '$tipo', '$foto', '$info' )" );

		header("location:index.php?contenido=noticias_empresa");
		
		
		// Cierre de conexión.
		$mysqli->close();
	}
?>


<div class="marco_formulario">

	<form class="formulario_noticias" enctype="multipart/form-data" method="post">
    	<a>Titulo</a>
        <br>
        <input type="text" id = "title" name="title">
        <br>
        <a>Contenido</a>
        <br>
        <input type="text" id = "content" name="content">
        <br>
        <a>Foto</a>
        <br>
        <input type="file" id = "foto" name="foto" >
        <br>
        <br>
        <input type="submit" id= "boton" name ="enviar" value="ENVIAR">
    </form>

</div>