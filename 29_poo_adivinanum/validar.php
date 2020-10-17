<?php
//Modelo MVC (Model - View - Controller) Este archivo es el concepto de controlador, es decir, recibe datos del formulario (la vista) y utiliza la clase CJUego para devolver un resultado:
//Tareas del controlador:

//Recoger el dato que viene del formulario:
if (isset($_POST["caja_num_jugador"])) {
	$num_jugador = $_POST["caja_num_jugador"];

	//Comprobar si hay acierto o fallo. Esto ya esta programado en la clase CJuego:
	//Requerimos el archivo con la definición de la clase Juego:
	require("CJuego.php");
	//Para ello, vamos a crear un nuevo objeto de la clase CJuego, que tendrá ya valores concretos:
	$obj_juego = new CJuego();	//Es como si cojo la plantilla CJuego, creo una fotocopia en la que voy a rellenar datos

	//Utilizar el objeto creado:
	//Llamo a la función inventarNumero:
	$obj_juego->inventarNumero();
	//Llamar a la función comprobar, pasándole el número del jugador, a ver si ha acertado:
	$resultado = $obj_juego->comprobar($num_jugador);

	if ($resultado == true) {
		echo "<p>Acierto!</p>";
	} else {
		echo "<p>Fallo</p>";
	}
	$obj_juego->num_secreto = 8;
	echo "<p>Num sec :".$obj_juego->num_secreto."</p>";
}
?>
<a href="formulario.php">Volver a jugar</a>
