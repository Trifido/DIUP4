<?php

	if(isset($_POST['aceptar'])){
		
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
		
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		$nombre=$_POST['nombre'];
		$apellidos=$_POST['apellidos'];
		$email=$_POST['email'];
	 	
		if( !empty($_POST['user']) ){
			
			$consulta=$mysqli->query("SELECT user FROM usuarios WHERE
									user='".$user."'");

			if( $consulta->num_rows ){
				
				echo '<script> alert("¡Usuario existente!") </script>';
			
			}else{
				
				$mysqli->query( "INSERT INTO usuarios ( nombre, apellidos, email, user, pass ) VALUES ( '$nombre', '$apellidos', '$email', '$user', '$pass' )" );
				echo '<script> alert("¡Usuario creado con éxito!") </script>';
				$_SESSION['user']=$user;
				header("location:index.php");
			}
		}
		
		// Cierre de conexión.
		$mysqli->close();
	}
?>

<div id = "titulo_usuario_registro">

	<h1> REGISTRO DE USUARIO </h1>

</div>

<div id ="marco_usuario_registro">

    <form id = "formulario" method = "post">
		<div id="right">            
            <div>nombre</div>
            <input id="text" type="text" name="nombre"required>
            <br>
            <div>apellidos</div>
            <input id="text" type="text" name="apellidos"required>
            <br>
            <div>email</div>
            <input id="text" type="email" name="email"required>
            <br>
            <div>usuario</div>
            <input id="text" type="text" name="user"required>
            <br>
            <div>contraseña</div>
            <input id="text" type="password" name="pass"required>
        </div>
        
        <div id = "botones">
            <input id = "boton" type="submit" name='aceptar' value="Aceptar" >
            <br>
            <input id = "boton" type="reset" name='reset' value="Reset">
		</div>
    </form>

</div>