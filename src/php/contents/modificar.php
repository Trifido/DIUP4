<?php

	if( isset( $_SESSION['empresa'] ) ){
		
		$var = "NUEVO CIF";
		$var2 = "cif";
		$var3 = "empresas";
		$var4 = 'empresa';
		
	}else{
		
		$var = "NUEVOS APELLIDOS";
		$var2 = "apellidos";
		$var3 = "usuarios";
		$var4 = 'user';
			
	}

	if( isset($_POST['aceptar'] ) ){
		
		include( "./src/php/basedatos/bdhandler.php" );
		include( "./src/php/basedatos/usershandler.php" );
		include( "./src/php/basedatos/pymeshandler.php" );
		
		$db = new bdhandler( "localhost", "diu", "root", "" );
		$query = $db->connection->query( "SELECT * FROM ".$var3." WHERE user = '".$_SESSION[$var4][0]."'");
		
		if( isset( $_SESSION['empresa'] ) ){
		
			$user = new Pyme();
			$user->get_pyme( $query->fetch_assoc() );
			
		}else{
			
			$user = new Usuario();
			$user->get_user( $query->fetch_assoc() );
				
		}
		
		
		
		// Carga de nuevos datos
		
		if( $user->check_password( $_POST['pass'] ) ){
			
			if( $_POST['nombre'] != "" )
				$nombre = $_POST['nombre'];
			else
				$nombre = $user->nombre;
			if( $_POST[$var2] != "" )
				$apellidos = $_POST[$var2];
			else
				$apellidos = $user->$var2;
			if( $_FILES["foto"]["name"] ){
				$foto = basename($_FILES["foto"]["name"]);
				include( "./src/php/upload.php" );
			}else
				$foto = $user->foto;
			if( $_POST['descripcion'] != "" )
				$info = $_POST['descripcion'];
			else
				$info = $user->info;
				
			$db->connection->query( "UPDATE ".$var3." SET nombre = '".$nombre."', 
														 ".$var2." = '".$apellidos."',
														 foto = '".$foto."',
														 info = '".$info."'
									WHERE user = '".$_SESSION[$var4][0]."'
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
            <a><?php echo $var ?></a>
            <br>
            <input id="text" type="text" name="<?php echo $var2 ?>" placeholder="<?php echo $var2 ?>">
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