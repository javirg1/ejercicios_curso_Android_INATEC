<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejemplo formulario de registro - Registrar</title>
</head>
<body>
	<center>
		<h3>HOLA!!!</h3>

		<p>Datos recogidos para el registro:</p>

		<?php
		//La validación correcta tiene que ser, email: admin@curso.com y pass: 1234
		$nombre = $_POST["caja_nombre"];
		$email = $_POST["caja_email"];
		$password = $_POST["caja_password"];
		//Conectar con la bbdd, para ver si tiene algun usuario con el email y el password recibidos:

		//1.-Conecto con el servidor de bbdd:
		//Creamos una conexión al servidor MySQL y a la bbdd bd_academia
		$conexion = mysqli_connect("localhost", "root", "", "bd_academia"); 

		//2.-Si tengo conexion, ya puedo insertar al nuevo usuario en la bbdd:
		//Montar una consulta SQL:
		$consulta = "INSERT INTO usuarios(nombre, email, clave) VALUES ('$nombre','$email','$password')";

		//3.-Lanzar la consulta a la bbdd mediante la conexion abierta:
		mysqli_query($conexion, $consulta);

		//4.-Necesito comprobar de alguna forma si el dato se ha insertado:
		//Una forma sería, pedir a la bbdd el nuevo id de usuario:
		$id_usuario = mysqli_insert_id($conexion);

		if ($id_usuario > 0) {
			echo "<p>Nuevo usuario insertado con el ID: $id_usuario</p>";
		} else {
			echo "<p>El usuario no ha podido insertarse</p>";
		}
		?>

	</center>
</body>
</html>