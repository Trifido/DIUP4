
<?php
	
	// Clase para manejar la conexion a la base de datos
	class bdhandler{
		
		private $server;
		private $user;
		private $pass;
		private $db;
		public $connection;
		
		public function __construct( $serveraux, $dbaux, $useraux, $passaux ){
			
			$this->server = $serveraux;
			$this->user = $useraux;
			$this->pass = $passaux;
			$this->db = $dbaux;
			
			$this->connection = new mysqli( $this->server,$this->user,$this->pass,$this->db );
			
		}
		
		public function close(){
			
			$this->connection->close();
		}
		
	}

?>