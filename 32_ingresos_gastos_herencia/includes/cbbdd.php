<?php
class CBBDD {
	//public, private, protected
	private $nombre_bbdd;
	private $user;
	private $server;
	private $password;
	protected $conexion;

	function __construct() {
		$this->nombre_bbdd = "bd_ingresos_gastos";
		$this->server = "localhost";
		$this->password="";
		$this->user = "root";
	}

	protected function conectarBD() {
		$this->conexion = mysqli_connect($this->server, $this->user, $this->password, $this->nombre_bbdd); 
	}
}


?>