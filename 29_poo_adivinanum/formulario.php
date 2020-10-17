<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Juego Adivina Número</title>
</head>
<body>
	<center>
		<h3>Formulario adivina número</h3>

		<p>Adivina un número entre 1 y 3:</p>

		<form action="validar.php" method="post">
			<p>Introduce número:</p>
			<p><input type="number" name="caja_num_jugador" min="1" max="3" size="6" />

			<p><input type="submit" value="Jugar"/></p>

		</form>

	</center>
</body>
</html>