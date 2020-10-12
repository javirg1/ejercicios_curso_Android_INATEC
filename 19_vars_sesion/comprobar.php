<?php
//Para poder mantener variables de sesión (variables que mantienen sus datos entre saltos o recargas de página):
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Juego Adivina número - vars sesión</title>
</head>
<body>
<?php
//Comprobar si ya existe una variable de sesión con el número ganador:
if (isset($_SESSION["num_ganador"])) {
	//Se trata de una partida en marcha, con lo cual el num ganador existe y el usuario aun no lo ha acertado:
	$num_ganador = $_SESSION["num_ganador"];
} else {
	//Sería el primer intento, o la primera vez que se juega:
	//Inventar un número ganador, y lo guardo en la variable de sesión, para que esté disponible para futuras tiradas, en caso de que el jugador no acierte:
	$num_ganador = rand(1,10);
	$_SESSION["num_ganador"] = $num_ganador;
}

$acierto = false;

//Recoger del formulario anterior, el número indicado por el jugador:
if (isset($_POST["inp_num_jugador"])) {
	$num_jugador = $_POST["inp_num_jugador"];
	//Comprobar si ha acertado:
	if ($num_jugador == $num_ganador) {
		$acierto = true;
	}
}

?>
	<center>
		<h2>Adivina número - Manteniendo el mismo hasta acertar - Vars Sesión</h2>

		<h3>RESULTADO !!!</h3>
		<?php
		echo "<h4>Num jugador: $num_jugador   ---    Num ganador: $num_ganador</h4>";
		if ($acierto == true) {
			echo "<h2 style='color:gren'>Acierto!!!</h2>";
			//Por si quiere echar otra partida, voy a eliminar el actual numero ganador (es decir, elimino la variable de sesión que tiene el número ganador):
			unset($_SESSION["num_ganador"]);
		} else {
			echo "<h2 style='color:red'>Fallo!!!</h2>";
		}

		?>
		<a href="index.php">Jugar de nuevo</a>
	</center>
</body>
</html>