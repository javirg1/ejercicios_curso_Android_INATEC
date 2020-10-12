<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>

    <style>
    td {
        text-align: center;
    }
    </style>
</head>

<body>
    <center>
        <h1>VideoClub Online</h1>
        <h3>Selecciona la película que quieres ver</h3>
        <hr>
        <table>
            <tr>
                <td>Titanic</td>
                <td>Shrek</td>
                <td>El Padrino</td>
                <td>Matrix</td>
                <td>Aladin</td>
                <td>Rocky</td>
            </tr>
            <tr>
                <td><img src="http://i3.ytimg.com/vi/FiRVcExwBVA/hqdefault.jpg" alt="" style="width:200px"></td>
                <td><img src="http://i3.ytimg.com/vi/F0xQYDWxSAQ/hqdefault.jpg" alt="" style="width:200px"></td>
                <td><img src="http://i3.ytimg.com/vi/gCVj1LeYnsc/hqdefault.jpg" alt="" style="width:200px"></td>
                <td><img src="http://i3.ytimg.com/vi/vN_Hx_It3r0/hqdefault.jpg" alt="" style="width:200px"></td>
                <td><img src="http://i3.ytimg.com/vi/M-kUb716fAI/hqdefault.jpg" alt="" style="width:200px"></td>
                <td><img src="http://i3.ytimg.com/vi/7RYpJAUMo2M/hqdefault.jpg" alt="" style="width:200px"></td>
            </tr>
            <tr>
                <?php
                for($i=0;$i<6;$i++){?>
                <td><a href="ver_peli.php?trailer=<?php echo $i?>">Ver trailer</a></td>
                <?php } ?>
                <!-- <td><a href="ver_peli.php?trailer=0">Ver trailer</a></td>
                <td><a href="ver_peli.php?trailer=1">Ver trailer</a></td>
                <td><a href="ver_peli.php?trailer=2">Ver trailer</a></td>
                <td><a href="ver_peli.php?trailer=3">Ver trailer</a></td>
                <td><a href="ver_peli.php?trailer=4">Ver trailer</a></td>
                <td><a href="ver_peli.php?trailer=5">Ver trailer</a></td> -->
            </tr>
        </table>

        <br><br>

        <!--Compruebo si vienen errores por intento de acceso url al archivo trailer.php -->
        <?php
        if (isset($_GET["error_trailer"])) {
            $error = $_GET["error_trailer"]; ?>
        <h3 style="color:red"><?php echo $error ?></h3>
        <?php } ?>

    </center>
</body>

</html>