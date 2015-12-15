<?php
	
	// Clase para manejar la información de los usuarios.
	
	class Usuario{
		
		public $id;
		public $nombre;
		public $apellidos;
		public $email;
		public $user;
		public $pass;
		public $info;
		public $foto;
		public $estado;
		public $admin;
		
		public $servidor;
		public $usuario;
		public $passdb;
		public $base_datos;
		public $mysqli;
		
		public function connect(){
			
			// Acceso a la BD	
			$this->servidor = "localhost";
			$this->usuario = "root";
			$this->passdb = "";
			$this->base_datos = "diu";
			
			// Conexión con el servidor.
			$this->mysqli = new mysqli( $this->servidor, $this->usuario, $this->passdb );
			if ( $this->mysqli->connect_errno ) {
				echo "Fallo al conectar a MySQL: " . $this->mysqli->connect_error;
			}
			
			// Seleccionar la BD.
			$this->mysqli->select_db( "$this->base_datos" );
			
		}
		
		public function get_user( $user ){
			
			$row = $this->mysqli->query( "SELECT * FROM usuarios WHERE user='".$user."'" );
			if ($row->num_rows > 0){
				$consulta = $row->fetch_assoc();
				
				$this->id = $consulta["id"];
				$this->nombre = $consulta["nombre"];
				$this->apellidos = $consulta["apellidos"];
				$this->email = $consulta["email"];
				$this->user = $consulta["user"];
				$this->pass = $consulta["pass"];
				$this->info = $consulta["info"];
				$this->foto = $consulta["foto"];
				$this->estado = $consulta["estado"];
				$this->admin = $consulta["admin"];
			}else{
				echo "no results";
       			return FALSE;
			}
		}
		
		public function throw_name(){
			
			echo( $this->nombre ." ". $this->apellidos);
		}
		
	}
	
	
?>