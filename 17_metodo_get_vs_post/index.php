<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Metodo GET vs POST</title>
</head>
<body>
	<center>
		<h3>Diferencia entre método GET y POST</h3>

		<?php
		//Compruebo si en la url viene una variable de error:
		if (isset($_GET["error"])) {
			$error = $_GET["error"];
			echo "<p style='color:red'>$error</p>";
		}

		?>

		<p>Selecciona una estación para ver la foto - METODO GET</p>
		<!-- Para pasar parámetros por la URL:
		-Primero, separar con una ? la página de las variables que voy a pasar
		-Segundo, tiene que ir en formato variable=valor, y si hay mas de una variable, hay que separarlas con el simbolo ampersan &
		-->
		<a href="ver_foto_get.php?foto=primavera&estacion=Primavera (La sangre altera)">Primavera</a>
		<a href="ver_foto_get.php?foto=verano&estacion=Verano (Q calor)">Verano</a>
		<a href="ver_foto_get.php?foto=otonio&estacion=Otoño (Se caen las hojas)">Otoño</a>
		<a href="ver_foto_get.php?foto=invierno&estacion=Invierno (Q nieva)">Invierno</a>

		<p></p>
		<p>Selecciona una estación para ver la foto - METODO POST</p>
		<form method="post" action="ver_foto_post.php">
			<p><input type="radio" value="0" name="estacion"/>Primavera</p>
			<p><input type="radio" value="1" name="estacion"/>Verano</p>
			<p><input type="radio" value="2" name="estacion"/>Otoño</p>
			<p><input type="radio" value="3" name="estacion"/>Invierno</p>

			<p><input type="submit" value="Ver estación"/></p>
		</form>

	</center>
</body>
</html>