<?php
//Vamos a utilizar variables de sesión para controlar si el usuario se ha identificado:
session_start();
//Vamos a comprobar si existe una variable de sesión que contenga el id de usuario:
if (isset($_SESSION["id_usuario"])) {
	//El usuario está identificado
	//Podría hacer una consulta y obtener todos sus datos
	$id_usuario = $_SESSION["id_usuario"];
	$nombre_usuario = $_SESSION["nombre_usuario"];
} else {
	//El usuario se está intentando colar, no se ha identificado:
	header("Location:../publica/login.php?error=Es necesario identificarse");
	exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicio Anuncios - Zona privada</title>
</head>
<body>
	<center>
		<h2><?php echo $nombre_usuario ?> - Insertar nuevo anuncio</h2>

		<p>-Volver al <a href="index.php">listado de anuncios</a> o si lo deseas <a href="salir.php">sal de tu zona privada</a></p>

		<form action="controlador.php?op=2" method="POST">
			<table width="400">
				<tr>
					<td>Título:</td>
					<td><input type="text" name="inp_titulo" size="40"></td>
				</tr>
				<tr>
					<td>Fecha:</td>
					<td><input type="date" name="inp_fecha"></td>
				</tr>
				<tr>
					<td>Precio:</td>
					<td><input type="number" min="0" name="inp_precio" size="6"></td>
				</tr>
				<tr>
					<td>Descripción:</td>
					<td><textarea name="inp_descripcion" cols="30" rows="3"></textarea></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Insertar"/></td>
				</tr>
			</table>
		</form>
		

	</center>
</body>
</html>