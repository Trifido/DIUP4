<?php

// CLASE PARA MANERJAS LAS EMPRESAS A NIVEL DE BD

class Pyme{
	
	public $id;
	public $nombre;
	public $cif;
	public $email;
	public $user;
	public $pass;
	public $info;
	public $foto;

	public function get_pyme( $consulta ){
		
		$this->id = $consulta["id"];
		$this->nombre = $consulta["nombre"];
		$this->cif = $consulta["cif"];
		$this->email = $consulta["email"];
		$this->user = $consulta["user"];
		$this->pass = $consulta["pass"];
		$this->info = $consulta["info"];
		$this->foto = $consulta["foto"];
		
		if( $this->foto == NULL )
			$this->foto = "nofoto.jpg";
		if( $this->info == NULL )
			$this->info = "No hay descripcion aun";
		
	}
	
	public function show_profile(){
			
		echo( '<img id ="foto_perfil" src ="./assets/img/'.$this->foto.'">
			<div id="preface">NOMBRE : </div> 
			<div id="proface">'.$this->nombre.'</div>
		
			<div id="preface">CIF: </div>
			<div id="proface">'.$this->cif.'</div>
		
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