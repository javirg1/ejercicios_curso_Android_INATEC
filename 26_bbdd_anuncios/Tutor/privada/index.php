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
		<h2>Bienvenido <?php echo $nombre_usuario ?> a tu zona privada</h2>

		<?php
		if (isset($_GET["msg"])) {
			$msg = $_GET["msg"];
			echo "<h4 style='color:red'>$msg</h4>";
		}
		?>

		<p>-Insertar <a href="form_nuevo_anuncio.php">nuevo anuncio</a> o si lo deseas <a href="salir.php">sal de tu zona privada</a></p>

		<p>Listado de tus anuncios, o <a href="../publica/index.php">ver la zona publica</a></p>
		<table width="600" style='border:solid 2px blue'>
			<tr>
				<td>FOTO</td>
				<td>TITULO</td>
				<td>FECHA</td>
				<td>PRECIO</td>
				<td></td>
				<td></td>
			<tr>
		<?php
			//Incluyo el archivo con las funciones:
			require("../includes/funciones.php");
			//Cargar los anuncios del usuario:
			$anuncios = cargarAnuncios($id_usuario);

			for($pos=0;$pos<count($anuncios);$pos++) {
				//Con este bucle recorremos posicion a posicion el array y extraer el anuncio que hay en cada posición:
				$anuncio = $anuncios[$pos];
				$id_anuncio = $anuncio["id_anuncio"];
				//Ahora ya puedo pintar la fila en HTML:
				?>
				<tr>
					<td><img src="../fotos/<?php echo $anuncio['foto'] ?>" width="80" /></td>
					<td><?php echo $anuncio["titulo"] ?></td>
					<td><?php echo $anuncio["fecha"] ?></td>
					<td><?php echo $anuncio["precio"] ?></td>
					<td><a href="controlador.php?op=1&id_anuncio=<?php echo $id_anuncio ?>" onclick="return confirm('¿Deseas `eliminar` este registro?')">eliminar</a></td>
					<td><a href="form_editar_anuncio.php?id_anuncio=<?php echo $id_anuncio ?>">editar</a></td>
				<tr>
			<?php } ?>
		</table>

	</center>
</body>
</html>