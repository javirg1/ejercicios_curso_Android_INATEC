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
Formulario para AÑADIR un anuncio nuevo a la zona privada del usuario
*****************************************************************************************-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=b, initial-scale=1.0">
    <title>Anucions - Nuevo</title>
</head>

<body>
    <center>
        <h1>WEB DE ANUNCIOS - COMPRA y VENTA</h1>
        <h2>Zona privada de <span style=color:forestgreen><?php echo $nombre_usuario ?></span></h2>
        <hr>
        <h3>Introduce los datos del nuevo anuncio</h3>
        <!-- Comprobamos si viene la variable -aviso- por el método GET de las opciones 1, 3 y 4 del controlador de la zona privada -->
        <?php
        if (isset($_GET["aviso"])) { ?>
            <p style="color:green"><?php echo $_GET["aviso"] ?></p>
        <?php } ?>

        <!--*************************************************************************************
		Mostramos el formulario
        *****************************************************************************************-->

        <!-- Pasaremos los datos -controlador_pr- que es el CONTROLADOR  de la zona privada -->
        <form action="controlador_pr.php" method="post" enctype="multipart/form-data">
            <!-- El primer input lo utilizaremos para decirle alcontrolador que hemos seleccionado la opción nº 1 -->
            <input type="hidden" name="op" value="1">
            <label for="">Título:</label>
            <input type="text" name="titulo" placeholder="Titulo del anuncio" required>
            <br><br>
            <p>Descripción:</p>
            <textarea name="descripcion" id="" cols="30" rows="10" placeholder="Descripción del anuncio" required></textarea>
            <br><br>
            <label for="">Precio:</label>
            <input type="number" name="precio" placeholder="Precio" required>
            <br><br>
            <label for="">Fecha:</label>
            <input type="date" name="fecha" required>
            <br><br>
            <label for="">Añade una foto, si lo deseas:</label>
            <input type="file" name="foto">
            <br><br>
            <input type="submit" value="Guardar">
            <br><br>
            <!-- Links para volver a la zona privada o a la zona pública -->
            <p>Volver a tu zona <a href="index.php">privada</a> o salir a la zona <a href="../publica/index.php">pública</a> y ver todos los anuncios</p>
        </form>
    </center>
</body>

</html>