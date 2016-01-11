<?php

	class Espacio{
		
		public $nombre;
		public $capacidad;
		public $precio;
		public $foto;
		public $info;
		public $estado;
		
		
		public function get_espacio( $consulta ){
			
			$this->nombre = $consulta["nombre"];
			$this->capacidad = $consulta["capacidad"];
			$this->precio = $consulta["precio"];
			$this->foto = $consulta["foto"];
			$this->info = $consulta["info"];
			$this->estado = $consulta["estado"];
			
			if( $this->foto == NULL )
				$this->foto = "nofoto.jpg";
			
		}
		
		public function show_espacio(){
		
			echo( '<img id ="img1" src ="./assets/img/'.$this->foto.'">' );
			
			echo( '<div id="right">' );
				
				echo('<div id="title">');
					echo $this->titulo;
				echo('</div>');
				
				echo('<div id="texto">');
					echo( $this->info );
				echo( '</div>' );
				
			echo('</div>');
		
		}
		
	}

?>