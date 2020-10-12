<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videoclub</title>
</head>
<?php
//Compruebo si en la url (GET) viene alguna variable con error:
if (isset($_GET["error"])) {
    echo "<p style='color:red'>" . $_GET["error"] . "<p>";
}
?>

<body>
    <center>
        <h1>Videoclub</h1>
        <br>
        <h2>Películas de youtube</h2>
        <br>
        <form action="registrar.php" method="post">
            <label for="">Título:</label>
            <input type="text" name="titulo" width="120" required>
            <br><br>
            <label for="">Código Youtube:</label>
            <input type="text" name="codigo_you" width="120" required>
            <br><br>
            <input type="submit" value="Registrar">

        </form>

        <br>

        <a href="formulario_buscar.php">Buscar un código</a>
        <a href="peliculas.php">Listar películas</a>



    </center>
</body>

</html>