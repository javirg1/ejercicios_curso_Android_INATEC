<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicio BD Acacemia</title>
</head>
<body>
	<center>
		<h3>Bienvenido a la zona privada de la academia</h3>

		<p>Listado de usuarios actuales</p>
		<table width="300" style='border:solid 2px blue'>
			<tr>
				<td>ID USUARIO</td>
				<td>NOMBRE</td>
				<td>EMAIL</td>
			<tr>
		<?php
			//Consulta a la bbdd para obtener todos los usuarios registrados en la tabla usuarios:
			//1.-Conecto con el servidor de bbdd:
			//Creamos una conexión al servidor MySQL y a la bbdd bd_academia
			$conexion = mysqli_connect("localhost", "root", "", "bd_academia"); 

			//2.-Si tengo conexion, ya le puedo preguntar si en la tabla usuarios tengo un usuario con el email y la clave
			//Montar una consulta SQL:
			$consulta = "select * from usuarios";

			//3.-Lanzar la consulta a la bbdd mediante la conexion abierta:
			$datos = mysqli_query($conexion, $consulta);

			//4.-No se cuantas filas de datos me va a devolver la bbdd:
			while($fila = mysqli_fetch_assoc($datos)) {
				//Con este bucle recorremos fila a fila, los datos que nos devuelve la consulta:
				//Extraigo de la fila en la que estoy, las columnas que me interesen:
				$id_usuario = $fila["id_usuario"];
				$nombre = $fila["nombre"];
				$email = $fila["email"];
				//Ahora ya puedo pintar la fila en HTML:
				?>
				<tr>
					<td><?php echo $id_usuario ?></td>
					<td><?php echo $nombre ?></td>
					<td><?php echo $email ?></td>
				<tr>
			<?php } ?>
		</table>

	</center>
</body>
</html>