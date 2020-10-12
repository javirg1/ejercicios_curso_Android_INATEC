<?php
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
	<center>
		<h2>Adivina número - Manteniendo el mismo hasta acertar - Vars Sesión</h2>

		<p color='orange'>
			
			<?php
			//A modo de demostración de que todas las páginas del mismo proyecto tienen acceso a la información (a las varaibles) de sesión, nos ponemos este chivato que nos dice si hay una partida en marcha y cual es el número a adivinar)
			if (isset($_SESSION["num_ganador"])) {
				$num_ganador = $_SESSION["num_ganador"];
				echo "Ya existe una partida en marcha y el número a adivinar es: $num_ganador";
			}
			?>
		</p>

		<form method="post" action="comprobar.php">
			<p>Adivina número entre 1 y 10</p>
			<p><input type="number" name="inp_num_jugador" min="1" max="10" size="6" required="true"/></p>

			<p><input type="submit" value="Jugar" />
		</form>
	</center>
</body>
</html>