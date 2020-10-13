<?php

// ************************************************************************************
// Vamos a utilizar variables de sesión
// ************************************************************************************

session_start();
?>

<!--*************************************************************************************
VISTA
Zona Pública
Formulario para LISTAR los anuncios de la zona pública -todos los usuarios-
*****************************************************************************************-->

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicio Anuncios - Zona pública</title>
	<script src="https://kit.fontawesome.com/15d8ae3708.js" crossorigin="anonymous"></script>
</head>
<body>
	<center>
		<h1>WEB DE ANUNCIOS - COMPRA y VENTA</h1>
		<!-- Comprobamos si viene la variable de sesión -id_usuario- de las opciones 1 o 2 del controlador de la zona pública -->
		<?php
		// Si el usuario está identificado, le ofrecemos el enlace para ir a la zona privada
		if (isset($_SESSION["id_usuario"])) { ?>
			<h2>Hola <span style=color:forestgreen><?php echo $_SESSION["nombre_usuario"] ?></span>, si lo deseas puedes ir a tu zona  <a href="../privada/index.php">privada</a></h2>
		<?php } else { ?>
			<h3>Si quieres poner tus anuncios, <a href="login.php">identifícate</a></h3>
		<?php } ?>

		<!--*************************************************************************************
		Listamos los anuncios de la zona pública alternando html y php
		*****************************************************************************************-->
		<hr>
		<h3>Listado de anuncios actuales</h3>
		<table width="600" style='border:solid 2px blue'>
			<tr>
				<td>FOTO</td>
				<td>TITULO</td>
				<td>FECHA</td>
				<td>PRECIO</td>
			<tr>
				<!-- Accedemos a la bbdd para obtener los anuncios de un usuario -->
		<?php
			require("../includes/conexion.php"); 
			// Montamos una consulta SQL
			$consulta = "select * from anuncios";
			// Lanzamos la consulta a la bbdd mediante la conexion abierta
			$datos = mysqli_query($conexion, $consulta);
				// No se cuantas filas de datos me va a devolver la bbdd
				// Con este bucle recorremos fila a fila, los datos que nos devuelve la consulta
			while($fila = mysqli_fetch_assoc($datos)) {
				//Ahora ya puedo pintar la fila en HTML:
				?>
				<!-- Mostramos un anuncio por cada fila -->
				<tr>
					<td><img src="../fotos/default.png" width="80" /></td>
					<td><?php echo $fila["titulo"] ?></td>
					<td><?php echo $fila["fecha"] ?></td>
					<td><?php echo $fila["precio"] ?></td>
					<!-- Link para ver los detalles del anuncio de essa fila Pasa el -id_anuncio- y la variable -op- con el valor 3 por url GET al controlador de la zona pública -->
				<td><a href="controlador.php?id_anuncio=<?php echo $fila["id_anuncio"] ?> & op=3" title="Editar"><i class="far fa-eye" style="color:green"></i></a></td>
				<tr>
			<?php } ?>
		</table>

	</center>
</body>
</html>
