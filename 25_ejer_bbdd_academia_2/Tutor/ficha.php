<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicios PHP - SQL -Ficha Alumno</title>
</head>
<body>
	<center>
		

		<p>FICHA DEL ALUMNO</p>

		<?php
		//Voy a leer de la url (método GET) el id del alumno seleccionado:
		if (isset($_GET["id_alumno"])) {
			$id_alumno = $_GET["id_alumno"];
			require("conexion.php"); 

			//2.-Si tengo conexion, le pido un alumno de forma aleatoria:
			//YEAR(CURDATE())-YEAR(fecha_nac) AS EDAD_ACTUAL
			$consulta = "Select * from alumnos where id=$id_alumno";

			//3.-Lanzar la consulta a la bbdd mediante la conexion abierta:
			$datos = mysqli_query($conexion, $consulta);

			//4.-Comprobar si me ha devuelto datos:
			if ($fila = mysqli_fetch_assoc($datos)) {
				$sexo = $fila["sexo"];
				$cod_postal = $fila["cod_postal"];
				$nombre = $fila["nombre"];
				$poblacion = $fila["poblacion"];
				$fecha_nac = $fila["fecha_nac"];
				//Ya de paso, calculo la edad:
				$fechaComoEntero = strtotime($fecha_nac);
				$año_nac = date("Y", $fechaComoEntero);
				$edad_act = date("Y") - $año_nac;
				$importe = $fila["importe_matricula"];
				$estudios = $fila["estudios"];
				echo "<p>Nombre (Sexo): $nombre ($sexo)</p>";
				echo "<p>Pob (CP): $poblacion ($cod_postal)</p>";
				echo "<p>Fecha nac: $fecha_nac</p>";
				echo "<p>Edad: $edad_act</p>";
				echo "<p>Importe: $importe</p>";
				echo "<p>Estudios: $estudios</p>";
			} else {
				echo "<p>No he obtenido ningún alumno con ese id</p>";
			}
		} else {
			echo "<p>No se indica alumno</p>";
		}

		?>
	</center>
</body>
</html>