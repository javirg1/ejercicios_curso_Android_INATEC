<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicios PHP - SQL</title>
</head>
<body>
	<center>
		<h3>1.-Crea un nuevo archivo llamado “alumno_mes.php” que se conecte a la bbdd “bd_academia” y que muestre cada vez que se recarga la página, un alumno elegido como el alumno del més (de forma aleatoria), su edad y población. El resultado esperado será algo parecido a esto:</h3>

		<p>Alumno del mes: María (23 años) – Madrid</p>

		<?php
		require("conexion.php");

		//2.-Si tengo conexion, le pido un alumno de forma aleatoria:
		//YEAR(CURDATE())-YEAR(fecha_nac) AS EDAD_ACTUAL
		$consulta = "Select nombre,poblacion,YEAR(CURDATE())-YEAR(fecha_nac) AS EDAD_ACTUAL from alumnos order by RAND() limit 1";

		//3.-Lanzar la consulta a la bbdd mediante la conexion abierta:
		$datos = mysqli_query($conexion, $consulta);


		//4.-Comprobar si me ha devuelto datos:
		if ($fila = mysqli_fetch_assoc($datos)) {
			$nombre = $fila["nombre"];
			$poblacion = $fila["poblacion"];
			$edad = $fila["EDAD_ACTUAL"];
			echo "<p>Alumno del mes: $nombre ($edad años) – $poblacion</p>";
		} else {
			echo "<p>No he obtenido ningún alumno</p>";
		}

		?>
	</center>
</body>
</html>