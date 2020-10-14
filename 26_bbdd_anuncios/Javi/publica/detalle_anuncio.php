<?php

// Utilizaremos funciones
require("../includes/funciones.php");

// ************************************************************************************
// Vamos a utilizar variables de sesión para controlar si el usuario se ha identificado
// ************************************************************************************

session_start();

//Comprobamos si viene por url el -$id_anuncio-. Si no viene en la url el id de un anuncio, no tiene sentido mostrar esta pagina
if (isset($_GET["id_anuncio"])) {
	$id_anuncio = $_GET["id_anuncio"];
	//Cargar los datos del anuncio
	$anuncio = cargarDatosAnuncio($id_anuncio);
	//var_dump($anuncio);exit;
} else {
	header("Location:index.php");
	exit;
}

?>

<!--*************************************************************************************
VISTA
Zona Privada
Formulario para VER el detalle de cada anuncio de la zona pública
*****************************************************************************************-->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=b, initial-scale=1.0">
    <title>Anuncios - Publicados</title>
    <script src="https://kit.fontawesome.com/15d8ae3708.js" crossorigin="anonymous"></script>
</head>

<body>
    <center>
        <h1>WEB DE ANUNCIOS - COMPRA y VENTA</h1>
		<?php
		// Links para movernos por las diferentes páginas
        if (isset($_SESSION["id_usuario"])) {
            $id_usuario= $_SESSION["id_usuario"];?>
        <h2>Hola <span style=color:forestgreen><?php echo $_SESSION["nombre_usuario"] ?></span></h2>
        <p><a href="../privada/index.php">Ir a mi zona privada</a></p>
		<?php } else { ?>
			<p>Si quieres poner tus anuncios <a href="login.php">identifícate</a></p>
		<?php } ?>
        <hr>
        <h3>Datos del anuncio</h3>
        <hr>
        <!-- Mostramos los datos del anuncio -->
        <img src="../fotos/<?php echo $anuncio["foto"] ?>" width="80" />
        <h3><span style=color:crimson>Artículo: </span><?php echo $anuncio["titulo"]?></h3>
        <h3><span style=color:crimson>Descripción: </span><?php echo $anuncio["descripcion"]?></h3>
		<h3><span style=color:crimson>Precio: </span><?php echo $anuncio["precio"]?></h3>
		<h3><span style=color:crimson>Fecha de publicación: </span><?php echo $anuncio["fecha"]?></h3>
        <h3><span style=color:crimson>Publicado por: </span><a href="anuncios_usuario.php?id_usuario=<?php echo $anuncio['id_usuario']?> & nombre=<?php echo $anuncio['nombre']?>"><?php echo $anuncio['nombre']?></a></h3>
        <hr>
        <p>Para volver al listado de anuncios, haz click <a href="index.php">aquí</a></p>
        
    </center>
</body>

</html>


