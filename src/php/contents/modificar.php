<?php
	if( isset($_POST['aceptar'] ) ){
		
		include( "./src/php/basedatos/bdhandler.php" );
		include( "./src/php/basedatos/usershandler.php" );
		
		$db = new bdhandler( "localhost", "diu", "root", "" );
		$user = new Usuario();
		$query = $db->connection->query( "SELECT * FROM usuarios WHERE user = '".$_SESSION['user'][0]."'");
		$user->get_user( $query->fetch_assoc() );
		
		// Carga de nuevos datos
		
		if( $user->check_password( $_POST['pass'] ) ){
			
			if( $_POST['nombre'] != "" )
				$nombre = $_POST['nombre'];
			else
				$nombre = $user->nombre;
			if( $_POST['apellidos'] != "" )
				$apellidos = $_POST['apellidos'];
			else
				$apellidos = $user->apellidos;
			if( $_FILES["foto"]["name"] ){
				$foto = basename($_FILES["foto"]["name"]);
				include( "./src/php/upload.php" );
			}else
				$foto = $user->foto;
			if( $_POST['descripcion'] != "" )
				$info = $_POST['descripcion'];
			else
				$info = $user->info;
				
			$db->connection->query( "UPDATE usuarios SET nombre = '".$nombre."', 
														 apellidos = '".$apellidos."',
														 foto = '".$foto."',
														 info = '".$info."'
									WHERE user = '".$_SESSION['user'][0]."'
			" );
			
		}else{
			
			echo( '<script>alert("Contraseña incorrecta")</script>' );
			
		}
		
		$db->close();
	}
?>
<div class="marco_perfil">
	
    <span> MODIFICAR PERFIL </span>
    
	<form id = "formulario_perfil" enctype="multipart/form-data" method = "post">           
            <a>NUEVO NOMBRE</a>
            <br>
            <input id="text" type="text" name="nombre" placeholder="nombre">
            <br>
            <a>NUEVOS APELLIDOS</a>
            <br>
            <input id="text" type="text" name="apellidos" placeholder="apellidos">
            <br>
           	<a>NUEVA DESCRIPCION</a>
            <br>
            <input id="text" type="text" name="descripcion" placeholder="descripcion personal">
            <input id = "boton" type="submit" name='aceptar' value="Aceptar" >
            <br>
            <a>NUEVA FOTO</a>
            <br>
            <input id="text" type="file" name="foto" >
            <br>
           <a> CONTRASEÑA</a>
           <br>
            <input id="text" type="password" name="pass"required placeholder="contraseña">
            
    </form>


</div>