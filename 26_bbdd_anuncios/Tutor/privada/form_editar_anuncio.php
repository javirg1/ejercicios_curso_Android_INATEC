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
//Vamos a ver si por GET se indica el id del anuncio a editar, porque si no es asi, redirijo al index de nuevo (no puedo hacer nada)
if (!isset($_GET["id_anuncio"])) {
	header("Location:index.php?error=Es necesario seleccionar el anuncio a editar");
	exit;
} else {
	//Recoger el id del anuncio a editar:
	$id_anuncio = $_GET["id_anuncio"];
	//Cargar los datos actuales del anuncio:
	//Incluyo el archivo con las funciones:
	require("../includes/funciones.php");
	$anuncio = cargarDatosAnuncio($id_anuncio);
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
		<h2><?php echo $nombre_usuario ?> - Editar anuncio</h2>

		<p>-Volver al <a href="index.php">listado de anuncios</a> o si lo deseas <a href="salir.php">sal de tu zona privada</a></p>

		<form action="controlador.php?op=3" method="POST">
			<input type="hidden" value="<?php echo $anuncio['id_anuncio'] ?>" name="inp_id_anuncio"/>
			<table width="400">
				<tr>
					<td>Título:</td>
					<td><input type="text" name="inp_titulo" size="40" value="<?php echo $anuncio['titulo'] ?>"></td>
				</tr>
				<tr>
					<td>Fecha:</td>
					<td><input type="date" name="inp_fecha" value="<?php echo $anuncio['fecha'] ?>"></td>
				</tr>
				<tr>
					<td>Precio:</td>
					<td><input type="number" min="0" name="inp_precio" size="6" value="<?php echo $anuncio['precio'] ?>"></td>
				</tr>
				<tr>
					<td>Descripción:</td>
					<td><textarea name="inp_descripcion" cols="30" rows="3"><?php echo $anuncio['descripcion'] ?></textarea></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Actualizar"/></td>
				</tr>
			</table>
		</form>
		

	</center>
</body>
</html>