<?php
//Si no viene en la url el id de un anuncio, no tiene sentido mostrar esta pagina:
if (isset($_GET["id_anuncio"])) {
	$id_anuncio = $_GET["id_anuncio"];
	//Cargar los datos del anuncio:
	//Incluyo el archivo con las funciones:
	require("../includes/funciones.php");
	$anuncio = cargarDatosAnuncio($id_anuncio);
	//var_dump($anuncio);exit;
} else {
	header("Location:index.php");
	exit;
}
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
		<h3>Volver al <a href="index.php">listado de anuncios</a></h3>
		<?php
		//Si el usuario está identificado, le ofrecemos el enlace para ir a la zona privada
		if (isset($_SESSION["id_usuario"])) { ?>
			<p>Hola <?php echo $_SESSION["nombre_usuario"] ?>, <a href="../privada/index.php">ir a mi zona privada</a></p>
		<?php } else { ?>
			<p>Si quieres poner tus anuncios <a href="login.php">identifícate</a></p>
		<?php } ?>
		<p>Detalle del anuncio</p>
		<h3><?php echo $anuncio["titulo"]?></h3>
		<p><img src="../fotos/default.png" width="300"></p>
		<p><?php echo $anuncio["descripcion"]?></p>
		<p>Fecha: <?php echo $anuncio["fecha"]?> - Precio: <?php echo $anuncio["precio"]?></p>
		<p>Publicado por: <?php echo $anuncio["nombre_usuario"]?> - <a href="">(Ver sus anuncios)</a></p>
		<h3>Volver al <a href="index.php">listado de anuncios</a></h3>

	</center>
</body>
</html>