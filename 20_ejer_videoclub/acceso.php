<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso</title>
</head>

<body>
    <!-- Formulario de acceso -->
    <center>
        <form action="validar.php" method="post">
            <h1>Bienvenido al VideoClub Online</h1>
            <p>Por favor, identifícate</p>
            <label for="">Usuario:</label>
            <input type="text" name="nombre" id="" placeholder="Alfanum.(mín. 6)">
            <br><br>
            <label for="">Password:</label>
            <input type="password" name="password" id="" placeholder="Num. impar (máx. 4)">
            <br><br>
            <input type="submit" name="" id="" value="Validar">
        </form>

        <!--Compruebo si vienen errores de validación y los muestro -->
        <?php
        if (isset($_GET["error"])) {
            $error = $_GET["error"]; ?>
        <h3 style="color:red"><?php echo $error ?></h3>
        <?php }

        if (isset($_GET["error_url"])) {
            $error = $_GET["error_url"]; ?>
        <h3 style="color:red"><?php echo $error ?></h3>
        <?php } ?>



    </center>
</body>

</html>