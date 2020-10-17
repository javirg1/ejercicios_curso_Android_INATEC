<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Juego Encuentra Número</title>
</head>
<body>
	<center>
		<h3>Formulario encuentra número</h3>

		<form action="validar.php" method="post">
			<p>Introduce mínimo:</p>
			<p><input type="number" name="caja_minimo" size="6" />

			<p>Introduce máximo:</p>
			<p><input type="number" name="caja_maximo" size="6" />

			<p>Introduce número a encontrar:</p>
			<p><input type="number" name="caja_num_jugador" size="6" />

			<p><input type="submit" value="Jugar"/></p>

		</form>

	</center>
</body>
</html>