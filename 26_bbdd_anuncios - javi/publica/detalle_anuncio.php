<?php

// ************************************************************************************
// Vamos a utilizar variables de sesión para controlar si el usuario se ha identificado
// ************************************************************************************

session_start();
//Vamos a comprobar si existe una variable de sesión que contenga el id de usuario:
if (isset($_SESSION["id_usuario"])) {
    //El usuario está identificado. Podría hacer una consulta y obtener todos sus datos
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
Formulario para EDITAR / ACTUALIZAR anuncios
*****************************************************************************************-->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=b, initial-scale=1.0">
    <title>Anuncios - Editar</title>
</head>

<body>
    <center>
        <h1>WEB DE ANUNCIOS - COMPRA y VENTA</h1>
        <h2>Zona privada de <span style=color:forestgreen><?php echo $nombre_usuario ?></span></h2>
        <!-- <p><?php echo $_SESSION["id_anuncio"] ?></p> -->
        <p><?php echo "Artículo: ".$_SESSION["titulo"] ?></p>
        <p><?php echo "Descripción: ".$_SESSION["descripcion"] ?></p>
        <p><?php echo "Precio: ".$_SESSION["precio"] ?></p>
        <p><?php echo "Fecha de publicación: ".$_SESSION["fecha"] ?></p>
    </center>
</body>

</html>