<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicios PHP - SQL</title>
</head>
<body>
	<center>
		<h3>2.-Crea un nuevo archivo llamado “importe_total.php” que se conecte a la bbdd “bd_academia” y muestre la suma total del importe pagado por el total de alumnos, el resultado debe ser similar a este:</h3>

		<p>Ejemplo de lo que quiero conseguir: IMPORTE TOTAL DE LAS MATRICULAS: 470€</p>

		<?php
		require("conexion.php");

		//2.-Si tengo conexion, le pido la suma de todos los importes
		$consulta = "select sum(importe_matricula) as IMPORTE_MATRICULAS from alumnos";

		//3.-Lanzar la consulta a la bbdd mediante la conexion abierta:
		$datos = mysqli_query($conexion, $consulta);


		//4.-Comprobar si me ha devuelto datos:
		if ($fila = mysqli_fetch_assoc($datos)) {
			$total = $fila["IMPORTE_MATRICULAS"];
			echo "<p>IMPORTE TOTAL DE LAS MATRICULAS: $total €</p>";
		} else {
			echo "<p>No he obtenido ningún importe</p>";
		}

		?>
	</center>
</body>
</html>