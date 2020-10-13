<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicio Anuncios - Zona pública</title>
</head>
<body>
	<center>
		<h1>WEB DE ANUNCIOS - COMPRA y VENTA</h1>
		<?php
		//Si el usuario está identificado, le ofrecemos el enlace para ir a la zona privada
		if (isset($_SESSION["id_usuario"])) { ?>
			<p>Hola <?php echo $_SESSION["nombre_usuario"] ?>, <a href="../privada/index.php">ir a mi zona privada</a></p>
		<?php } else { ?>
			<p>Si quieres poner tus anuncios <a href="login.php">identifícate</a></p>
		<?php } ?>
		<p>Listado de anuncios actuales</p>
		<table width="600" style='border:solid 2px blue'>
			<tr>
				<td>FOTO</td>
				<td>TITULO</td>
				<td>FECHA</td>
				<td>PRECIO</td>
			<tr>
		<?php
			//Incluyo el archivo con las funciones:
			require("../includes/funciones.php");
			//Cargar todos los anuncios:
			$anuncios = cargarAnuncios();

			for($pos=0;$pos<count($anuncios);$pos++) {
				//Con este bucle recorremos posicion a posicion el array y extraer el anuncio que hay en cada posición:
				$anuncio = $anuncios[$pos];
				$id_anuncio = $anuncio["id_anuncio"];
				//Ahora ya puedo pintar la fila en HTML:
				?>
				<tr>
					<td><img src="../fotos/default.png" width="80" /></td>
					<td><a href="ver_anuncio.php?id_anuncio=<?php echo $id_anuncio ?>"><?php echo $anuncio["titulo"] ?></a></td>
					<td><?php echo $anuncio["fecha"] ?></td>
					<td><?php echo $anuncio["precio"] ?></td>
				<tr>
			<?php } ?>
		</table>

	</center>
</body>
</html>