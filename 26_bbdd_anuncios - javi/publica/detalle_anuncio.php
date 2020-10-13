<?php

// ************************************************************************************
// Vamos a utilizar variables de sesión para controlar si el usuario se ha identificado
// ************************************************************************************

session_start();

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
</head>

<body>
    <center>
        <h1>WEB DE ANUNCIOS - COMPRA y VENTA</h1>
        <p>Si quieres poner tus anuncios, <a href="login.php">identifícate</a></p>
        <hr>
        <img src="../fotos/default.png" width="80" />
        <h3><span style=color:blue>Artículo: </span><?php echo $_SESSION["titulo"] ?></h3>
        <h3><span style=color:blue>Descripción: </span><?php echo $_SESSION["descripcion"] ?></h3>
        <h3><span style=color:blue>Precio: </span><?php echo $_SESSION["precio"] ?></h3>
        <h3><span style=color:blue>Fecha de publicación: </span><?php echo $_SESSION["fecha"] ?></h3>
        <hr>
        <p>Para volver al listado de anuncios, haz click <a href="index.php">aquí</a></p>
        
    </center>
</body>

</html>