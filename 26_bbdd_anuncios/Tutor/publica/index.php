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
		<?php } 

		//Incluyo el archivo con las funciones:
		require("../includes/funciones.php");
		//Vamos a distinguir si tengo que mostrar todos los anuncios, o los de un usuario concreto:
		if(isset($_GET["id_usuario"])) {
			//Cargar los anuncios de este usuario:
			$id_usuario = $_GET["id_usuario"];
			$anuncios = cargarAnuncios($id_usuario);
			//Cargar los datos del usuario para saber al menos su nombre:
			$usuario = cargarDatosUsuario($id_usuario);
			$nombre_usuario = $usuario["nombre"];
			echo "<p>Listado de los anuncios de $nombre_usuario. <a href='index.php'>(Volver al listado principal)</a></p>";
		} else {
			//Cargar todos los anuncios:
			$anuncios = cargarAnuncios();
			echo "<p>Listado de todos los anuncios</p>";
		}
		?>
		
		<table width="600" style='border:solid 2px blue'>
			<tr>
				<td>FOTO</td>
				<td>TITULO</td>
				<td>FECHA</td>
				<td>PRECIO</td>
			<tr>
		<?php
			for($pos=0;$pos<count($anuncios);$pos++) {
				//Con este bucle recorremos posicion a posicion el array y extraer el anuncio que hay en cada posición:
				$anuncio = $anuncios[$pos];
				$id_anuncio = $anuncio["id_anuncio"];
				//Ahora ya puedo pintar la fila en HTML:
				?>
				<tr>
					<td><img src="../fotos/<?php echo $anuncio['foto'] ?>" width="80" /></td>
					<td><a href="ver_anuncio.php?id_anuncio=<?php echo $id_anuncio ?>"><?php echo $anuncio["titulo"] ?></a></td>
					<td><?php echo $anuncio["fecha"] ?></td>
					<td><?php echo $anuncio["precio"] ?></td>
				<tr>
			<?php } ?>
		</table>

	</center>
</body>
</html>