<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver trailer película</title>
</head>

<body>
    <!-- Compruebo que se ha hecho click en un link "Ver trailer" -->
    <?php
    if (isset($_GET["trailer"]) == true) {
        $trailer = $_GET["trailer"];
    } else {
        header("location:catalogo.php?error_trailer=Para ver un trailer, debes selecionarlo del catálogo");
        exit;
    }

    // Creo y lleno un array con los t´tyulos y links de youtube
    $titulo = ["Titanic", "Shrek", "El Padrino", "Matrix", "Aladin", "Rocky"];
    $lista_trailer = ["FiRVcExwBVA", "F0xQYDWxSAQ", "gCVj1LeYnsc", "vN_Hx_It3r0", "M-kUb716fAI", "7RYpJAUMo2M"];
    ?>

    <center>

        <br><br><br><br>

        <!-- Muestro el trailer seleccionado en el catálogo-->
        <h3><?php echo $titulo[$trailer] ?></h3>

        <br>

        <iframe width="600" height="355" src="https://www.youtube.com/embed/<?php echo $lista_trailer[$trailer] ?>"
            frameborder="0" allowfullscreen></iframe>
        <br><br>
        <a href="catalogo.php">Volver al catálogo</a>
    </center>

</body>

</html>