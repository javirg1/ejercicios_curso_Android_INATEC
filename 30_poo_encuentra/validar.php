<?php
//Modelo MVC (Model - View - Controller) Este archivo es el concepto de controlador, es decir, recibe datos del formulario (la vista) y utiliza la clase CJUego para devolver un resultado:
//Tareas del controlador:

//Recoger datos que vienen del formulario:
if (isset($_POST["caja_num_jugador"]) && isset($_POST["caja_minimo"]) && isset($_POST["caja_maximo"])) {
	$minimo = $_POST["caja_minimo"];
	$maximo = $_POST["caja_maximo"];
	$num_jugador = $_POST["caja_num_jugador"];

	//Voy a utilizar la clase CJuego para hacer el trabajo, encontrar el número del jugador:
	//Crear el objeto de la clase:
	require("CJuego.php");
	//creo el objeto de la clase CJuego, que automaticamente llama al constructor, al cual le paso los parametros espera:
	$obj_juego = new CJuego($minimo,$maximo,$num_jugador);

	do {
		//Llamo a la función comprobar:
		$has_acertado = $obj_juego->jugar();
		//Muestro el número en pantalla, para comprobar si funciona bien:
		echo "<p>".$obj_juego->getNumeroInventado()."</p>";
	} while ($has_acertado == false);

	echo "<p>Acierto en ".$obj_juego->getIntentos()." intentos</p>";

}
?>
<a href="formulario.php">Volver a jugar</a>