<?php
require("cbbdd.php");
class CMovimiento extends CBBDD {
	//Atributos
	private $id;
	private $fecha;
	private $descripcion;
	private $importe;
	private $tipo_movimiento;
	private $saldo;


	//Propiedades

	function __construct() {
		parent::__construct();
	}
	//Esta función inserta un movimiento, devuelve el id (num >0) si ha ido bien, y un 0 si ha ido mal:
	public function insertarMovimiento($fecha, $descripcion, $importe, $tipo_movimiento) {
		//Conexion con la bbdd:
		$this->conectarBD();
		//Diseñar la consulta de tipo insert
		$consulta = "insert into movimientos(fecha, descripcion, importe, tipo_movimiento) values ('$fecha','$descripcion','$importe','$tipo_movimiento')";

		//Ejecutar la consulta y ver si se ha ejecutado la consulta
		mysqli_query($this->conexion, $consulta);
		//Devolver un resultado
		return mysqli_insert_id($this->conexion);
	}

	public function actualizarMovimiento($id, $fecha, $descripcion, $importe, $tipo_movimiento) {
		//Conexion con la bbdd:
		$this->conectarBD();
		//Diseñar la consulta de tipo insert
		$consulta = "update movimientos set fecha='$fecha', descripcion='$descripcion', importe='$importe', tipo_movimiento='$tipo_movimiento' where id = '$id'";

		//Ejecutar la consulta y ver si se ha ejecutado la consulta
		mysqli_query($this->conexion, $consulta);

		//Devolver un resultado
		return mysqli_affected_rows($this->conexion);
	}

	public function eliminarMovimiento($id) {
		//Conexion con la bbdd:
		$this->conectarBD();
		//Diseñar la consulta de tipo insert
		$consulta = "delete from movimientos where id='$id'";

		//Ejecutar la consulta y ver si se ha ejecutado la consulta
		mysqli_query($this->conexion, $consulta);
		//Devolver un resultado
		return mysqli_affected_rows($this->conexion);
	}

	public function calcularSaldo() {
		$saldo = 0;
		//Conexion con la bbdd:
		$this->conectarBD();
		//Diseñar la consulta de tipo select
		$consulta = "Select sum(tipo_movimiento*importe) as SALDO from movimientos";

		//Ejecutar la consulta y ver si se ha insertado el movimiento
		$datos = mysqli_query($this->conexion, $consulta);
		//Recorro la respuesta de la bbdd 
		if ($fila = mysqli_fetch_assoc($datos)) {
			$saldo = $fila["SALDO"];
		}
		//devolver un resultado:
		return $saldo;
	}

	//Lanza una consulta a la bbdd para obtener el listado de todos los movimientos, y los paso a un array, que es lo que devuelve esta función
	public function listarMovimientos() {
		$movimientos = array();
		//Conexion con la bbdd:
		$this->conectarBD();
		//Diseñar la consulta de tipo select
		$consulta = "Select * from movimientos order by fecha Desc";

		//Ejecutar la consulta y ver si se ha insertado el movimiento
		$datos = mysqli_query($this->conexion, $consulta);
		//Recorro la respuesta de la bbdd 
		while ($fila = mysqli_fetch_assoc($datos)) {
			$movimientos[] = $fila;
		}
		//devolver un resultado:
		return $movimientos;

	}

	public function cargarDatos($id) {
		$movimiento = array();
		//Conexion con la bbdd:
		$this->conectarBD();
		//Diseñar la consulta de tipo select
		$consulta = "Select * from movimientos where id='$id'";

		//Ejecutar la consulta y ver si se ha insertado el movimiento
		$datos = mysqli_query($this->conexion, $consulta);
		//Recorro la respuesta de la bbdd 
		if ($fila = mysqli_fetch_assoc($datos)) {
			$movimiento = $fila;
		}
		//devolver un resultado:
		return $movimiento;
	}
}
?>