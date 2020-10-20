<?php
require("cbbdd.php");
class CUsuario extends CBBDD {
	private $email;
	private $password;

	function __construct() {
		parent::__construct();
	}

	public function validar($email,$password) {
		//Conexion con la bbdd:
		$this->conectarBD();

	}
}


?>