<?php

// Utilizaremos funciones
require("../includes/funciones.php");

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

        if (isset($_GET["id_usuario"])) {
            $id_usuario = $_GET["id_usuario"];
            $nombre = $_GET["nombre"];
        }
        if (isset($_SESSION["id_usuario"])) {
        ?>
        <h2>Hola <span style=color:forestgreen><?php echo $_SESSION["nombre_usuario"] ?></span></h2>
        <p><a href="../privada/index.php">Ir a mi zona privada</a></p>


        <?php } else { ?>
        <h3>Si quieres poner tus anuncios, <a href="login.php">identifícate</a></h3>
        <?php } ?>

        <!--*************************************************************************************
		Listamos los anuncios de la zona pública
		*****************************************************************************************-->
        <hr>
        <h3>Listado de anuncios actuales de <span style=color:crimson><?php echo $nombre ?></span></h3>
        <table width="600" style='border:solid 2px blue'>
            <tr>
                <td>FOTO</td>
                <td>TITULO</td>
                <td>FECHA</td>
                <td>PRECIO</td>
            <tr>
                <!-- Accedemos a la bbdd para obtener los anuncios de un usuario -->
                <?php
                // Cargamos todos los anuncios utilizando una función
                // No le pasamos parámetros porque queremos ver todos los anuncios publicados.
                $anuncios = cargarAnuncios($id_usuario);
                // Con este bucle recorremos fila a fila, los datos que nos devuelve la consulta
                for ($pos = 0; $pos < count($anuncios); $pos++) {
                    // Dejamos en la variable -$anuncio- los datos de cada fila a cada paso de bucle
                    $anuncio = $anuncios[$pos];
                    // Obtenemos también el -id_anuncio- del array porque lo pasareos después por url en el link (debajo)
                    $id_anuncio = $anuncio["id_anuncio"];
                    //Ahora mostramos los datos en la tabla
                ?>
            <tr>
                <td><img src="../fotos/default.png" width="80" /></td>
                <td><?php echo $anuncio["titulo"] ?></a></td>
                <td><?php echo $anuncio["fecha"] ?></td>
                <td><?php echo $anuncio["precio"] ?></td>
                <!-- Link para ver los detalles del anuncio. Pasamos por url el -$id_anuncio- que hemos obtenido antes -->
                <td><a href="detalle_anuncio.php?id_anuncio=<?php echo $id_anuncio ?>" title="Ver anuncio"><i
                            class="far fa-eye" style="color:green"></i></a></td>
            <tr>

                <?php } ?>
        </table>
        <br>
        <p>Para ver todos los anuncios publicados, haz click <a href="index.php">aquí</a></p>
    </center>
</body>

</html>