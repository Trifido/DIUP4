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
		
		public function get_user( $consulta ){
			
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
			
			if( $this->foto == NULL )
				$this->foto = "nofoto.jpg";
			if( $this->info == NULL )
				$this->info = "No hay descripcion aun";
			
		}
		
		public function throw_name(){
			
			echo( $this->nombre ." ". $this->apellidos);
		}
		
		public function show_user(){
			
			echo( '<img id ="img1" src ="./assets/img/'.$this->foto.'">' );
        
			echo( '<div id="right">' );
				
				echo('<div id="title">');
					$this->throw_name();
				echo('</div>');
				
				echo('<div id="texto">');
					echo( $this->info );
				echo( '</div>' );
				
			echo('</div>');
			
		}
		
		public function show_profile(){
			
			echo( '<img id ="foto_perfil" src ="./assets/img/'.$this->foto.'">
				<div id="preface">NOMBRE : </div> 
				<div id="proface">'.$this->nombre.'</div>
			
				<div id="preface">APELLIDOS: </div>
				<div id="proface">'.$this->apellidos.'</div>
			
				<div id="preface">EMAIL: </div>
				<div id="proface">'.$this->email.'</div>
				<br>
				<div id="preface">DESCRIPCION:</div>
				<br>
				<br>
				<div id="proface_desc">'.$this->info.'</div> ' 
			);
		}
		
		public function check_password( $pass ){
			
			if( $this->pass == $pass )
				return true;
			else
				return false;
			
		}
		
	}
	
	
?>