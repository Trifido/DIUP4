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
					admin BOOLEAN DEFAULT false,
					PRIMARY KEY(id, user)
					)" 
					);
	}
	
	// Inserta en la tabla "usuarios" el usuario de prueba "pepe" con pass "1234".
	$consulta=$mysqli->query( "SELECT * FROM usuarios WHERE user='pepe'" );
	$filas=$consulta->num_rows;

	// Si la consulta devuelve 0 filas es que pepe no existe
	if( !$filas )
	{
		$mysqli->query( "INSERT INTO usuarios ( nombre, apellidos, email, user, pass ) 
							VALUES ( 'pepe', 'robledo', 's@localhost.dev', 'pepe', 1234 )" );
	}
	
	// CREACION DEL ADMIN EN USUARIOS CON PASS 1234
	$consulta=$mysqli->query( "SELECT * FROM usuarios WHERE user='admin'" );
	$filas=$consulta->num_rows;

	// Si la consulta devuelve 0 filas es que el admin no existe
	if( !$filas )
	{
		$mysqli->query( "INSERT INTO usuarios ( nombre, apellidos, email, user, pass, admin ) 
							VALUES ( 'alberto', 'meana', 's@localhost.dev', 'admin', 1234, 1 )" );
	}
	
	// Si la tabla "usuarios" no existe, crearla.
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
					PRIMARY KEY(id, user)
					)" 
					);
	}
	
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