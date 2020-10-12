<?php

// ************************************************************************************
// Vamos a utilizar variables de sesión para controlar si el usuario se ha identificado
// ************************************************************************************

session_start();
//Vamos a comprobar si existe una variable de sesión que contenga el id de usuario
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

<!--*************************************************************************************
VISTA
Zona Privada
Formulario para LISTAR los anuncios del usuario
Permite añadir, editar y eliminar anuncios -CRUD-
*****************************************************************************************-->

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicio Anuncios - Zona privada</title>
	<script src="https://kit.fontawesome.com/15d8ae3708.js" crossorigin="anonymous"></script>

</head>

<body>
	<center>
		<h1>WEB DE ANUNCIOS - COMPRA y VENTA</h1>
		<h2>Hola <span style=color:forestgreen><?php echo $nombre_usuario ?></span>, estás en tu zona privada</h2>
		<!-- Comprobamos si viene la variable -aviso- por el método GET de las opciones 1, 3 y 4 del controlador de la zona privada -->
		<?php
		if (isset($_GET["aviso"])) { ?>
			<p style="color:green"><?php echo $_GET["aviso"] ?></p>
		<?php } ?>
		<!-- Links para crear un nuevo anuncio o para salir de la zona privada -->
		<p>Si lo deseas, puedes insertar un <a href="nuevo.php">nuevo anuncio</a> o ver todos los anuncios <a href="../publica/index.php">de la zona publica</a></p>
		<p><a href="salir.php">Log out</a> para salir de tu zona privada</p>
		<hr>
		<h3>Estos son tus anuncios publicados</h3>

		<!--*************************************************************************************
		Listamos los anuncios del usuario alternando html y php
		*****************************************************************************************-->

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
				$consulta = "select * from anuncios where id_usuario=$id_usuario";
				// Lanzamos la consulta a la bbdd mediante la conexion abierta
				$datos = mysqli_query($conexion, $consulta);
				// No se cuantas filas de datos me va a devolver la bbdd
				// Con este bucle recorremos fila a fila, los datos que nos devuelve la consulta
				while ($fila = mysqli_fetch_assoc($datos)) {
				?>
					<!-- Mostramos un anuncio por cada fila -->
			<tr>
				<td><img src="../fotos/default.png" width="80" /></td>
				<td><?php echo $fila["titulo"] ?></td>
				<td><?php echo $fila["fecha"] ?></td>
				<td><?php echo $fila["precio"] ?></td>

				<!--*************************************************************************************
				Ponemos dos iconos en cada fila: uno para editar el anuncio y otro para eliminarlo
				*****************************************************************************************-->

				<!-- Link para editar/actualizar el anuncio de la fila. Pasa el -id_anuncio- y la variable -op- con el valor 2 por url GET al controlador de la zona privada -->
				<td><a href="controlador_pr.php?id_anuncio=<?php echo $fila["id_anuncio"] ?> & op=2" title="Editar"><i class="far fa-edit" style="color:green"></i></a></td>
				<!-- Link para eliminar el anuncio de la fila. Pasa el -id_anuncio- y la variable -op- con el valor 4 por url GET al controlador de la zona privada -->
				<td><a href="controlador_pr.php?id_anuncio=<?php echo $fila["id_anuncio"] ?> & op=4" title="Eliminar" onclick="return confirm('¿Quieres eliminar el anuncio')"><i class="far fa-trash-alt" style="color:red"></i></a></td>
			<tr>
			<?php } ?>
		</table>

	</center>
</body>

</html>