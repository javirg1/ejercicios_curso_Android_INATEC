<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Videoclub - Buscar</title>
</head>
<body>
	<center>
	<h3>Videoclub - Resultado de búsqueda</h3>
		<?php
		$codigo_you = $_POST["codigo_you"];

		// Conexión con la bbdd

		$conexion = mysqli_connect("localhost", "root", "", "bd_videoclub");

		// creamos consulta sql de selección

		$sql = "select * from peliculas where cod_youtube='$codigo_you'";

		// Lanzamos la consulta y almacenamos el resultado en una variable

		$datos = mysqli_query($conexion, $sql);

		// Comprobamos si ha devuelto datos

		if ($fila = mysqli_fetch_assoc($datos)) {
			echo "<h2>El código <em>'$codigo_you'</em> ya existe en la bbdd para la película </h2>";
		} else {
			echo "<h2 style='color:red'>El código <em>'$codigo_you'</em> no existe en la bbdd</h2>";
		}
		?>

	<br>
	<a href="formulario_buscar.php">Buscar otro código</a>
	<a href="peliculas.php">Listar películas</a>
	<a href="formulario_registro.php">Registrar otra película</a>
	

	</center>
</body>
</html>