<?php
class CCalculadora {
	//Atributos
	private $operando1;	//Tipo número
	private $operando2;	//Tipo número
	private $operacion; //Tipo número (codifica las operaciones 0->+, 1->- ...)
	private $res;
	private $operaciones;

	//Propiedades
	public function getOperando1() {
		return $this->operando1;
	}

	public function getOperando2() {
		return $this->operando2;
	}

	public function getOperacion() {
		return $this->operacion;
	}

	public function getSigno() {
		return $this->operaciones[$this->operacion];
	}

	public function getRes(){
		return $this->res;
	}

	//Funciones

	//Definimos el constructor:
	function __construct($num1,$num2,$op) {
		//Guardar estos parametros en los atributos, para poder usarlos desde otras funciones:
		$this->operando1 = $num1;
		$this->operando2 = $num2;
		$this->operacion = $op;
		$this->operaciones = ['+','-','*','/'];
		//Directamente llamo a la función operar:
		$this->operar();
	}

	private function operar() {
		switch ($this->operacion) {
			case 0:	//Sumar
				$this->res = $this->operando1 + $this->operando2;
				break;
			case 1:
				$this->res = $this->operando1 - $this->operando2;
				break;
			case 2:
				$this->res = $this->operando1 * $this->operando2;
				break;
			case 3:
				if ($this->operando2 == 0) {
					$this->res = "Operación no válida";
				} else {
					$this->res = $this->operando1 / $this->operando2;
				}
				break;
			default:
				$this->res = "Operación desconocida";
				break;
		}
	}
}
?>