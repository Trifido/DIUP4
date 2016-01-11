<?php

	class Noticia{
		
		public $titulo;
		public $empresa;
		public $tipo;
		public $foto;
		public $info;
		public $visibilidad;
		
		
		public function get_noticia( $consulta ){
			
			$this->titulo = $consulta["titulo"];
			$this->empresa = $consulta["empresa"];
			$this->tipo = $consulta["tipo"];
			$this->foto = $consulta["foto"];
			$this->info = $consulta["info"];
			$this->visibilidad = $consulta["visibilidad"];
			
			if( $this->foto == NULL )
				$this->foto = "nofoto.jpg";
			
		}
		
		public function show_noticia(){
		
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