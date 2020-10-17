<?php
class CJuego {
	//Atributos
	private $val_minimo;
	private $val_maximo;
	private $num_adivinar;
	private $numero_inventado;
	private $intentos;

	//Pdtes:
	//-Numro jugador como atributo
	//-Cambiar la funcion iniciarJuego por el concepto constructor:
	//Es la primera función que se ejecuta (de forma automatica, sin tener que llamarla) cuando se crea un objeto de la clase

	//Propiedades
	//Se puede acceder al contenido del numero inventado:
	public function getNumeroInventado() {
		return $this->numero_inventado;
	}

	//Permito saber el valor del atributo intentos:
	public function getIntentos() {
		return $this->intentos;
	}

	//Funciones

	//Empezamos por el constructor de la clase:
	function __construct($minimo,$maximo,$num_jugador) {
		$this->val_minimo = $minimo;
		$this->val_maximo = $maximo;
		$this->num_adivinar = $num_jugador;
		$this->intentos = 0;
	}

	//El resto de funciones:
	public function jugar() {
		//Cada vez que se llama a esta función, es que se ha realizado un intento:
		$this->intentos++;
		$this->numero_inventado = rand($this->val_minimo,$this->val_maximo);
		if ($this->numero_inventado == $this->num_adivinar) {
			return true;
		} else {
			return false;
		}
	}
}
?>