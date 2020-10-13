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
    <title>Anucions - Editar</title>
</head>

<body>
    <center>
        <h1>WEB DE ANUNCIOS - COMPRA y VENTA</h1>
        <h2>Zona privada de <span style=color:forestgreen><?php echo $nombre_usuario ?></span></h2>
        <!-- Links para volver a la zona privada o a la zona pública sin actualizar -->
        <p>Volver a tu zona <a href="index.php">privada</a> sin actualizar</p>
        <p>Si lo deseas, puedes ver todos los anuncios saliendo a la zona <a href="../publica/index.php">pública</a></p>
        <hr>
        <h3>Vas a actualizar los datos del anuncio <span style=color:darkmagenta><?php echo '"' . $_SESSION["titulo"] . '"' ?></span></h3>
        <br>
        <!-- Pasaremos los datos a -controlador_pr- que es el CONTROLADOR  de la zona privada -->
        <form action="controlador_pr.php" method="post">
            <!-- El primer input lo utilizaremos para decirle alcontrolador que hemos seleccionado la opción nº 3 -->
            <input type="hidden" name="op" value="3">
            <!-- Todos los datos los pasaremos con variables de sesión utilizando el método POST -->
            <!-- El -id_anuncio- lo necesitaremos en el controlador para pasarlo a la función -editar- -->
            <input type="hidden" name="id_anuncio" value="<?php echo $_SESSION["id_anuncio"] ?>">
            <label for="">Título:</label>
            <input type="text" name="titulo" value="<?php echo $_SESSION["titulo"] ?>">
            <br><br>
            <p>Descripción:</p>
            <textarea name="descripcion" id="" cols="30" rows="10"><?php echo $_SESSION["descripcion"] ?></textarea>
            <br><br>
            <label for="">Precio:</label>
            <input type="number" name="precio" value="<?php echo $_SESSION["precio"] ?>">
            <br><br>
            <label for="">Fecha:</label>
            <input type="date" name="fecha" value="<?php echo $_SESSION["fecha"] ?>">
            <br><br>
            <p>Aqui irá la foto</p>
            <br><br>
            <input type="submit" value="Actualizar">
        </form>
    </center>
</body>

</html>