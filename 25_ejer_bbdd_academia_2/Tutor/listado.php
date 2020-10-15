<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicio PHP - BBDD - 3</title>
</head>
<body>
	<center>

		<p>Listado de alumnos actuales</p>
		<table width="600" style='border:solid 2px blue'>
			<tr>
				<td>NOMBRE</td>
				<td>POBLACION</td>
			<tr>
		<?php
			require("conexion.php"); 

			//2.-Si tengo conexion, ya le puedo preguntar por todas los alumnos
			//Montar una consulta SQL:
			$consulta = "select * from alumnos";

			//3.-Lanzar la consulta a la bbdd mediante la conexion abierta:
			$datos = mysqli_query($conexion, $consulta);

			//4.-No se cuantas filas de datos me va a devolver la bbdd:
			while($fila = mysqli_fetch_assoc($datos)) {
				//Con este bucle recorremos fila a fila, los datos que nos devuelve la consulta:
				//Ahora ya puedo pintar la fila en HTML:
				?>
				<tr>
					<td><a href="ficha.php?id_alumno=<?php echo $fila["id"] ?>"><?php echo $fila["nombre"] ?></a></td>
					<td><?php echo $fila["poblacion"] ?></td>
				<tr>
			<?php } ?>
		</table>
		<p>Si lo deseas puedes <a href="nuevo_alumno.php">Añadir nuevo alumno</a></p>
	</center>
</body>
</html>