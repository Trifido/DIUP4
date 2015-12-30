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
		
		$user=$_POST['user'];
		$pass=$_POST['pass'];
	 
		if( !empty($_POST['user']) && !empty($_POST['pass']) ){
			
			$consulta=$mysqli->query("SELECT user, admin FROM usuarios WHERE
									user='".$user."' and pass='".$pass."'");

			if( $consulta->num_rows ){
				
				$user=$consulta->fetch_row();
				// Cierre de conexión.
				
				if($user[1])
					$_SESSION['admin']=$user;
				else
					$_SESSION['user']=$user;
				header("location:index.php");
				
			}else{
				
				$consulta=$mysqli->query("SELECT user FROM empresas WHERE
									user='".$user."' and pass='".$pass."'");
				
				if( $consulta->num_rows ){
				
					$user=$consulta->fetch_row();
					// Cierre de conexión.
					
					$_SESSION['empresa']=$user;
					header("location:index.php");
	
				}else
				
					echo "<p id=error><span>Usuario o contraseña incorrecto!!</span></p>";		
				}
			}
			
		// Cierre de conexión.
		$mysqli->close();
	}
?>


<div class="init_session">

	<div class="session_square">
    	
       	<h1> Iniciar Sesión </h1>
        
        <form class = "barra_sesion" method="post" >
            <input name = 'user' type = "text" id="texto" size ="13" placeholder="User" required>
            <br>
            <input name = 'pass' type="password" id="texto" size ="13" placeholder="*****" required>
            <br>
            <input name ='enviar' type="submit" id="button" value="Enviar">
            <br>
            <input name ='reset' type="reset" id="button" value="Reset">
        </form>
        
    </div>

</div>
