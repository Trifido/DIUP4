<?php

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
	
	// Si la BD no existe, crearla.
	if( !$mysqli->query( "USE DATABASE $base_datos" ) )
		$mysqli->query( "CREATE DATABASE $base_datos" );
	
	// Seleccionar la BD.
	$mysqli->select_db( "$base_datos" );
	
	// Si la tabla "usuarios" no existe, crearla.
	if( !$mysqli->query( "SELECT * FROM usuarios" ) )
	{
		$mysqli->query( "CREATE TABLE usuarios
				   (
					id INT ( 3 ) auto_increment,
					nombre VARCHAR ( 50 ) NOT NULL,
					apellidos VARCHAR ( 50 ) NOT NULL,
					email VARCHAR ( 50 ) NOT NULL,
					user VARCHAR ( 50 ) NOT NULL,
					pass VARCHAR ( 15 ) NOT NULL,
					info VARCHAR ( 150),
					foto VARCHAR ( 50 ),
					estado BOOLEAN DEFAULT false,
					admin BOOLEAN DEFAULT false,
					PRIMARY KEY(id, user)
					)" 
					);
	}
	
	// Si la tabla "empresas" no existe, crearla.
	if( !$mysqli->query( "SELECT * FROM empresas" ) )
	{
		$mysqli->query( "CREATE TABLE empresas
				   (
					id INT ( 3 ) auto_increment,
					nombre VARCHAR ( 50 ) NOT NULL,
					cif VARCHAR ( 50 ) NOT NULL,
					email VARCHAR ( 50 ) NOT NULL,
					user VARCHAR ( 50 ) NOT NULL,
					pass VARCHAR ( 15 ) NOT NULL,
					foto VARCHAR ( 50 ),
					info VARCHAR ( 150 ),
					PRIMARY KEY(id, user)
					)" 
					);
	}
	

	
	// Si la tabla pertenecer ("trabaja en" en el ER) no existe, crearla.
	if( !$mysqli->query( "SELECT * FROM pertenecer" ) )
	{
		$mysqli->query( "CREATE TABLE pertenecer
				   (
					id INT ( 3 ) auto_increment,
					user1 VARCHAR ( 50 ) NOT NULL,
					user2 VARCHAR ( 50 ) NOT NULL,
					puesto VARCHAR ( 50 ) NOT NULL,
					PRIMARY KEY(id, user1, user2)
					)" 
		);
	}
	
	// Si la tabla noticia no existe, crearla.
	if( !$mysqli->query( "SELECT * FROM noticia" ) )
	{
		$mysqli->query( "CREATE TABLE noticia
				   (
					id INT ( 3 ) auto_increment,
					titulo VARCHAR ( 50 ) NOT NULL,
					empresa VARCHAR ( 50 ) NOT NULL,
					tipo VARCHAR ( 50 ) NOT NULL,
					foto VARCHAR ( 50 ),
					info VARCHAR ( 150 ),
					visibilidad BOOLEAN DEFAULT true,
					PRIMARY KEY( id,titulo )
					)" 
		);
	}
	
	// Si la tabla espacios no existe, crearla.
	if( !$mysqli->query( "SELECT * FROM espacio" ) )
	{
		$mysqli->query( "CREATE TABLE espacio
				   (
					id INT ( 3 ) auto_increment,
					nombre VARCHAR ( 50 ) NOT NULL,
					capacidad INT ( 3 ) NOT NULL,
					precio INT ( 3 ) NOT NULL,
					info VARCHAR ( 150 ),
					estado BOOLEAN DEFAULT false,
					PRIMARY KEY(id, nombre)
					)" 
		);
	}
	
	// Si la tabla evento no existe, crearla.
	if( !$mysqli->query( "SELECT * FROM evento" ) )
	{
		$mysqli->query( "CREATE TABLE evento
				   (
					id INT ( 3 ) auto_increment,
					fecha DATETIME NOT NULL,
					nombre_empresa VARCHAR ( 50 ) NOT NULL,
					nombre_espacio VARCHAR ( 50 ) NOT NULL,
					nombre VARCHAR ( 50 ) NOT NULL,
					foto VARCHAR ( 50 ),
					info VARCHAR ( 150 ),
					PRIMARY KEY(id, nombre,nombre_empresa,nombre_empresa,fecha )
					)" 
		);
	}
	
	// Si la tabla pago no existe, crearla.
	if( !$mysqli->query( "SELECT * FROM pago" ) )
	{
		$mysqli->query( "CREATE TABLE pago
				   (
					id INT ( 3 ) auto_increment,
					nombre_empresa VARCHAR ( 50 ) NOT NULL,
					fecha DATETIME NOT NULL,
					cantidad INT ( 10 ) NOT NULL,
					estado BOOLEAN DEFAULT false,
					PRIMARY KEY( id )
					)" 
		);
	}
	
	// Si la tabla reserva no existe, crearla.
	if( !$mysqli->query( "SELECT * FROM reserva" ) )
	{
		$mysqli->query( "CREATE TABLE reserva
				   (
					id INT ( 3 ) auto_increment,
					nombre_empresa VARCHAR ( 50 ) NOT NULL,
					nombre_espacio VARCHAR ( 50 ) NOT NULL,
					fecha DATETIME NOT NULL,
					PRIMARY KEY(id, nombre_empresa, nombre_espacio )
					)" 
		);
	}
	
	// Si la tabla reserva no existe, crearla.
	if( !$mysqli->query( "SELECT * FROM asistencia" ) )
	{
		$mysqli->query( "CREATE TABLE asistencia
				   (
					id INT ( 3 ) auto_increment,
					nombre_evento VARCHAR ( 50 ) NOT NULL,
					nombre_empleado VARCHAR ( 50 ) NOT NULL,
					PRIMARY KEY(id, nombre_evento, nombre_empleado )
					)" 
		);
	}
	
	// INSERCION DATOS DE PRUEBA --------------------
	// ------------------------
	// USUARIOS DE PRUEBA: 
	// ------------------------
		// Inserta en la tabla "usuarios" el usuario de prueba "jose" con pass "1234".
		$consulta=$mysqli->query( "SELECT * FROM usuarios WHERE user='jose'" );
		$filas=$consulta->num_rows;
		// Si la consulta devuelve 0 filas es que jose no existe1
		if( !$filas ){
			$mysqli->query( "INSERT INTO usuarios ( nombre, apellidos, email, user, pass, foto ) 
								VALUES ( 'Jose Manuel', 'Lupion Ibanez', 's@localhost.dev', 'jose', 1234, 'user1.jpg' )" );
			$mysqli->query( "UPDATE usuarios SET info = 'este es el texto de info de jose' where user = 'jose' "); 
		}
		// Inserta en la tabla "usuarios" el usuario de prueba "juan" con pass "1234".
		$consulta=$mysqli->query( "SELECT * FROM usuarios WHERE user='juan'" );
		$filas=$consulta->num_rows;
		// Si la consulta devuelve 0 filas es que juan no existe1
		if( !$filas ){
			$mysqli->query( "INSERT INTO usuarios ( nombre, apellidos, email, user, pass, foto ) 
								VALUES ( 'Juan', 'Martinez Saez', 's@localhost.dev', 'juan', 1234,'user2.jpg' )" );
			$mysqli->query( "UPDATE usuarios SET info = 'este es el texto de info de juan' where user = 'juan' ");
		}
		// Inserta en la tabla "usuarios" el usuario de prueba "maria" con pass "1234".
		$consulta=$mysqli->query( "SELECT * FROM usuarios WHERE user='maria'" );
		$filas=$consulta->num_rows;
		// Si la consulta devuelve 0 filas es que maria no existe1
		if( !$filas ){
			$mysqli->query( "INSERT INTO usuarios ( nombre, apellidos, email, user, pass,foto ) 
								VALUES ( 'Maria', 'Diaz Rodriguez', 's@localhost.dev', 'maria', 1234,'user3.jpg' )" );
			$mysqli->query( "UPDATE usuarios SET info = 'este es el texto de info de maria' where user = 'maria' ");
		}
		
	// ------------------------
	// ADMINISTRADOR : 
	// ------------------------
		// CREACION DEL ADMIN EN USUARIOS CON PASS 1234
		$consulta=$mysqli->query( "SELECT * FROM usuarios WHERE user='admin'" );
		$filas=$consulta->num_rows;
		// Si la consulta devuelve 0 filas es que el admin no existe
		if( !$filas )
		{
			$mysqli->query( "INSERT INTO usuarios ( nombre, apellidos, email, user, pass, admin ) 
								VALUES ( 'alberto', 'meana', 's@localhost.dev', 'admin', 1234, 1 )" );
		}
	// ------------------------
	// EMPRESAS : 
	// ------------------------
		//  Inserta en la tabla "empresas" la empresa farma con pass 1234
		$consulta=$mysqli->query( "SELECT * FROM empresas WHERE user='farma'" );
		$filas=$consulta->num_rows;
		
		// Si la consulta devuelve 0 filas es que el admin no existe
		if( !$filas )
		{
			$mysqli->query( "INSERT INTO empresas ( nombre, cif, email, user, pass ) 
								VALUES ( 'farma', '76767676', 's@localhost.dev', 'farma', 1234 )" );
		}
	
	// Cierre de conexión.
	$mysqli->close();
	
?>