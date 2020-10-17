<?php
class CJuego {
	//Atributos
	private $val_minimo;
	private $val_maximo;
	private $num_secreto;

	//Propiedades
	private function dimeMinimo() {
		return $this->val_minimo;
	}

	private function dimeMaximo() {

	}


	//Funciones
	public function inventarNumero() {
		//Empiezo por dar un valor a minimo maximo:
		$this->val_minimo=1;
		$this->val_maximo=3;
		//Debido a la sintaxis de php, cuando accedo a un atributo se antepone $this
		$this->num_secreto = rand($this->val_minimo,$this->val_maximo);
	}

	//En la sintaxis de php, los parámetros se usan como una variable normal y corriente (no se usa el $this)
	public function comprobar($num_jugador) {
		if ($num_jugador == $this->num_secreto) {
			return true;
		} else {
			return false;
		}
	}
}
?>